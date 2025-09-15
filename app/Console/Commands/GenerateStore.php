<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Store;
use mysqli;
use Symfony\Component\Process\Process;

class GenerateStore extends Command
{
	protected $signature = 'site:generate 
                            {id : The Store id} 
                            {--language=en_US} 
                            {--currency=ILS} 
                            {--timezone=Asia/Jerusalem}';

	protected $description = 'Generate a new Magento store';
	private string $logFile;

	public function handle()
	{
		try {
			$storeId = $this->argument('id');
			$language = $this->option('language');
			$currency = $this->option('currency');
			$timezone = $this->option('timezone');

			// =================== CONFIG ===================
			$dbHost = '127.0.0.1';
			$pass = 'A~12345Jaddou';
			$user = 'adminaj';
			$adminEmail = 'alaa@aj-group.ps';
			$adminFirstName = 'Alaa M.';
			$adminLastName = 'Jaddou';
			$backendFrontName = 'xadmin';
			$osHost = "https://aj-group.ps";
			$osPort = "9200";
			$osPass = 'W3pAsqIER116hOqn';
			$baseUrl = "https://{$storeId}.aj-group.ps/";

			$mageRoot = "/var/www/htdocs/stores/{$storeId}";
			$src = '/var/www/htdocs/website/store_example';
			$this->logFile = storage_path("logs/generate-store-{$storeId}.log");

			// =================== STEP 1: COPY STORE ===================
			$this->info("→ Copying store files...");
			$this->logProgress("Copying store files...");
			$this->copyFolder($src, $mageRoot);
			$this->logProgress("Store files copied successfully!");

			// =================== STEP 2: CREATE DB ===================
			$this->createDB($storeId, '127.0.0.1', 'root', 'AlaaM.Jaddo3#');

			// =================== STEP 3: Nginx Configurations ===================
			$this->createNginxRecord($storeId, $mageRoot);

			// =================== STEP 4: MAGENTO INSTALL ===================
			$this->installMagento($mageRoot, $baseUrl, $dbHost, $storeId, $user, $pass, $adminFirstName, $adminLastName, $adminEmail, $backendFrontName, $language, $currency, $timezone, $osHost, $osPort, $osPass);

			// =================== STEP 5: DEPLOY SAMPLE DATA ===================
			$this->deploySampleData($mageRoot);

			// =================== STEP 6: Fix Permissions ===================
			$this->fixPermissions($mageRoot);

			// =================== STEP 7: Upgrade Store ===================
			$this->upgradeStore($mageRoot);

			// =================== STEP 8: Fix Permissions ===================
			$this->fixPermissions($mageRoot);

			// =================== STEP 9: Show Result ===================
			$this->showResult($baseUrl, $backendFrontName);

			$this->info("✅ Store generation completed successfully!");

		} catch (\Throwable $e) {
			$this->error("❌ Store generation failed: " . $e->getMessage());
			return Command::FAILURE;
		}

		return Command::SUCCESS;
	}

	private function runProcess(string $command, string $cwd = null): void
	{
		$this->info("Running: {$command}");
		$process = Process::fromShellCommandline($command, $cwd);
		$process->setTimeout(3600); // unlimited timeout
		$process->run(function ($type, $buffer) {
			echo $buffer; // stream live output
		});

		if (!$process->isSuccessful()) {
			throw new \RuntimeException("Process failed: " . $process->getErrorOutput());
		}
	}

	private function copyFolder($src, $dst): void
	{
		if (!is_dir($dst)) mkdir($dst, 0755, true);
		$dir = opendir($src);
		while (($file = readdir($dir)) !== false) {
			if ($file === '.' || $file === '..') continue;
			$srcPath = "$src/$file";
			$dstPath = "$dst/$file";
			if (is_dir($srcPath)) {
				$this->copyFolder($srcPath, $dstPath);
			} else {
				copy($srcPath, $dstPath);
			}
		}
		closedir($dir);
	}

	private function createDB($storeId, $dbAdminHost, $dbAdminUser, $dbAdminPass): void
	{
		$this->logProgress("Creating database {$storeId}");
		$this->info("→ Creating database '{$storeId}'...");
		$mysqli = new mysqli($dbAdminHost, $dbAdminUser, $dbAdminPass);
		if ($mysqli->connect_error) {
			$this->logProgress("Failed to connect to MySQL: " . $mysqli->connect_error);
			throw new \RuntimeException("DB Connection failed: " . $mysqli->connect_error);
		}

		try {
			if (!$mysqli->query("CREATE DATABASE IF NOT EXISTS `$storeId` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
				$this->logProgress("Error creating database: " . $mysqli->error);
				throw new \RuntimeException("Error creating database: " . $mysqli->error);
			}

			if (!$mysqli->query("GRANT ALL PRIVILEGES ON `$storeId`.* TO 'adminaj'@'localhost';")) {
				$this->logProgress("Error granting privileges: " . $mysqli->error);
				throw new \RuntimeException("Error granting privileges: " . $mysqli->error);
			}

			$mysqli->query("FLUSH PRIVILEGES;");
			$this->info("✓ Database '{$storeId}' created successfully.");
			$this->logProgress("Database '{$storeId}' created successfully.");
		} finally {
			$mysqli->close();
		}
	}

	private function createNginxRecord($storeId, $mage_root): void
	{
		$this->logProgress("Creating Nginx record for {$storeId}");;
		$this->info("→ Setting up Nginx for {$storeId}.aj-group.ps");
		$nginx_conf = "/etc/nginx/sites-available/{$storeId}.aj-group.ps";
		$nginx_conf_content = "server {
			    listen 443;
			    server_name {$storeId}.aj-group.ps;
			    set \$MAGE_ROOT {$mage_root};
			    set \$MAGE_DEBUG_SHOW_ARGS 0;
			
			    root \$MAGE_ROOT/pub;
			    index index.php;
			    autoindex off;
			    charset UTF-8;
			    error_page 404 403 = /errors/404.php;
			
			    location /.user.ini { deny all; }
			
			    location ~* ^/setup($|/) {
			        root \$MAGE_ROOT;
			        location ~ ^/setup/index.php {
			            deny all;
			            fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
			            fastcgi_param PHP_FLAG  \"session.auto_start=off \n suhosin.session.cryptua=off\";
			            fastcgi_param PHP_VALUE \"memory_limit=756M \n max_execution_time=600\";
			            fastcgi_read_timeout 600s;
			            fastcgi_connect_timeout 600s;
			            fastcgi_index index.php;
			            fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
			            include fastcgi_params;
			        }
			        location ~ ^/setup/(?!pub/). { deny all; }
			        location ~ ^/setup/pub/ { add_header X-Frame-Options \"SAMEORIGIN\"; }
			    }
			
			    location ~* ^/update($|/) {
			        root \$MAGE_ROOT;
			        location ~ ^/update/index.php {
			            fastcgi_split_path_info ^(/update/index.php)(/.+)$;
			            fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
			            fastcgi_index index.php;
			            fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
			            fastcgi_param PATH_INFO \$fastcgi_path_info;
			            include fastcgi_params;
			        }
			        location ~ ^/update/(?!pub/). { deny all; }
			        location ~ ^/update/pub/ { add_header X-Frame-Options \"SAMEORIGIN\"; }
			    }
			
			    location / { try_files \$uri \$uri/ /index.php\$is_args\$args; }
			
			    location /pub/ {
			        location ~ ^/pub/media/(downloadable|customer|import|custom_options|theme_customization/.*\.xml) { deny all; }
			        alias \$MAGE_ROOT/pub/;
			        add_header X-Frame-Options \"SAMEORIGIN\";
			    }
			
			    location /static/ {
			        location ~ ^/static/version\d*/ { rewrite ^/static/version\d*/(.*)\$ /static/\$1 last; }
			        location ~* \.(ico|jpg|jpeg|png|gif|svg|svgz|webp|avif|avifs|js|css|eot|ttf|otf|woff|woff2|html|json|webmanifest)$ {
			            add_header Cache-Control \"public, max-age=31536000, immutable\";
			            add_header X-Frame-Options \"SAMEORIGIN\";
			            if (!-f \$request_filename) { rewrite ^/static/(version\d*/)?(.*)\$ /static.php?resource=\$2 last; }
			        }
			        location ~* \.(zip|gz|gzip|bz2|csv|xml)$ {
			            add_header Cache-Control \"no-store\";
			            add_header X-Frame-Options \"SAMEORIGIN\";
			            expires off;
			            if (!-f \$request_filename) { rewrite ^/static/(version\d*/)?(.*)\$ /static.php?resource=\$2 last; }
			        }
			    }
			
			    location /media/ {
			        try_files \$uri \$uri/ /get.php\$is_args\$args;
			        location ~ ^/media/theme_customization/.*\.xml { deny all; }
			        location ~* \.(ico|jpg|jpeg|png|gif|svg|svgz|webp|avif|avifs|js|css|eot|ttf|otf|woff|woff2)$ {
			            add_header Cache-Control \"public\";
			            add_header X-Frame-Options \"SAMEORIGIN\";
			            expires +1y;
			            try_files \$uri \$uri/ /get.php\$is_args\$args;
			        }
			        location ~* \.(zip|gz|gzip|bz2|csv|xml)$ {
			            add_header Cache-Control \"no-store\";
			            add_header X-Frame-Options \"SAMEORIGIN\";
			            expires off;
			            try_files \$uri \$uri/ /get.php\$is_args\$args;
			        }
			        add_header X-Frame-Options \"SAMEORIGIN\";
			    }
			
			    location /media/customer/ { deny all; }
			    location /media/downloadable/ { deny all; }
			    location /media/import/ { deny all; }
			    location /media/custom_options/ { deny all; }
			
			    location /errors/ { location ~* \.xml$ { deny all; } }
			
			    location ~ ^/(index|get|static|errors/report|errors/404|errors/503|health_check)\.php$ {
			        try_files \$uri =404;
			        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
			        fastcgi_buffers 16 16k;
			        fastcgi_buffer_size 32k;
			        fastcgi_param PHP_FLAG  \"session.auto_start=off \n suhosin.session.cryptua=off\";
			        fastcgi_param PHP_VALUE \"memory_limit=756M \n max_execution_time=18000\";
			        fastcgi_read_timeout 600s;
			        fastcgi_connect_timeout 600s;
			        fastcgi_index index.php;
			        fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name;
			        include fastcgi_params;
			    }
			
			    gzip on;
			    gzip_disable \"msie6\";
			    gzip_comp_level 6;
			    gzip_min_length 1100;
			    gzip_buffers 16 8k;
			    gzip_proxied any;
			    gzip_types text/plain text/css text/js text/xml text/javascript application/javascript application/x-javascript application/json application/xml application/xml+rss image/svg+xml;
			    gzip_vary on;
			
			    location ~* (\.php$|\.phtml$|\.htaccess$|\.htpasswd$|\.git) { deny all; }
			}";

		$this->runProcess("echo " . escapeshellarg($nginx_conf_content) . " | sudo tee $nginx_conf");
		$this->runProcess("sudo ln -s $nginx_conf /etc/nginx/sites-enabled/{$storeId}.aj-group.ps");
		$this->runProcess("sudo nginx -t");
		$this->runProcess("sudo nginx -s reload");

		$this->logProgress("Nginx record for {$storeId}.aj-group.ps created successfully");
		$this->info("✓ Nginx configured successfully");
	}

	private function installMagento(...$args): void
	{
		$this->logProgress("Installing Magento");
		[$mage_root, $baseurl, $dbHost, $storeId, $user, $pass, $adminFirstName, $adminLastName, $adminEmail, $backendFrontName, $language, $currency, $timezone, $osHost, $osPort, $osPass] = $args;

		$cmd = "sudo php {$mage_root}/bin/magento setup:install "
			. "--cleanup-database "
			. "--base-url={$baseurl} "
			. "--db-host={$dbHost} "
			. "--db-name={$storeId} "
			. "--db-user={$user} "
			. "--db-password='{$pass}' "
			. "--admin-firstname='{$adminFirstName}' "
			. "--admin-lastname='{$adminLastName}' "
			. "--admin-email='{$adminEmail}' "
			. "--admin-user={$user} "
			. "--admin-password='{$pass}' "
			. "--backend-frontname={$backendFrontName} "
			. "--language={$language} "
			. "--currency={$currency} "
			. "--timezone={$timezone} "
			. "--use-rewrites=1 "
			. "--search-engine=opensearch "
			. "--opensearch-enable-auth=1 "
			. "--opensearch-index-prefix={$storeId} "
			. "--opensearch-host={$osHost} "
			. "--opensearch-port={$osPort} "
			. "--opensearch-username={$user} "
			. "--opensearch-password='{$osPass}' "
			. "--opensearch-timeout=300";

		$this->runProcess($cmd, $mage_root);
		$this->info("✓ Magento installed successfully");
		$this->logProgress("Magento installed successfully");
	}

	private function deploySampleData($mage_root): void
	{
		$this->logProgress("Deploying sample data");
		$this->runProcess("sudo php -d memory_limit=2G {$mage_root}/bin/magento sampledata:deploy", $mage_root);
		$this->info("✓ Sample data deployed successfully");
		$this->logProgress("Sample data deployed successfully");
	}

	private function fixPermissions($mage_root): void
	{
		$this->logProgress("Fixing permissions");
		$this->runProcess("sudo chown -R www-data:www-data $mage_root");
		$this->runProcess("sudo find $mage_root -type f -exec chmod 644 {} +");
		$this->runProcess("sudo find $mage_root -type d -exec chmod 755 {} +");

		$this->info("✓ Permissions fixed");
		$this->logProgress("Permissions fixed");
	}

	private function upgradeStore($mage_root): void
	{
		$this->logProgress("Upgrading Magento");
		$this->runProcess("php {$mage_root}/bin/magento setup:upgrade", $mage_root);
		$this->info("✓ Magento upgraded successfully");
		$this->logProgress("Magento upgraded successfully");
	}

	private function showResult($baseurl, $backendFrontName): void
	{
		$this->logProgress("Installation Complete!");
		$this->info("🎉 Installation Complete!");

		$this->logProgress("Store Details:");
		$this->logProgress("Frontend: {$baseurl}");
		$this->line("Frontend: {$baseurl}");
		$this->logProgress("Admin: {$baseurl}{$backendFrontName}");
		$this->line("Admin: {$baseurl}{$backendFrontName}");
		$this->logProgress("User: adminaj");
		$this->line("User: adminaj");
		$this->logProgress("Password: A~12345Jaddou");
		$this->line("Password: A~12345Jaddou");
	}

	private function logProgress(string $message): void
	{
		$timestamp = date('Y-m-d H:i:s');
		file_put_contents($this->logFile, "[$timestamp] $message\n", FILE_APPEND);
	}
}
