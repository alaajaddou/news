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

	public function handle()
	{
		$storeId = $this->argument('name');
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
		$src = __DIR__ . '/store_example';

		// =================== STEP 1: COPY STORE ===================
		$this->copyFolder($src, $mageRoot);

		// =================== STEP 2: CREATE DB ===================
		$this->createDB($storeId, $dbHost, $user, $pass);

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

		// =================== STEP 8: Show Result ===================
		$this->showResult($baseUrl, $backendFrontName);
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
		$this->task("Creating database '{$storeId}' and setting up privileges", function () use ($dbAdminPass, $dbAdminUser, $dbAdminHost, $storeId) {
			$dbName = $storeId;

			// 1. Connect as root
			$this->info("  → Connecting to MySQL as admin user...");
			$mysqli = new mysqli($dbAdminHost, $dbAdminUser, $dbAdminPass);
			if ($mysqli->connect_error) {
				throw new \RuntimeException("DB Connection failed: " . $mysqli->connect_error);
			}

			try {
				// 2. Create DB
				$this->info("  → Creating database '{$dbName}' with UTF8MB4 charset...");
				if (!$mysqli->query("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;")) {
					throw new \RuntimeException("Error creating database: " . $mysqli->error);
				}

				// 3. Grant privileges
				$this->info("  → Granting privileges to 'adminaj'@'localhost'...");
				if (!$mysqli->query("GRANT ALL PRIVILEGES ON `$dbName`.* TO 'adminaj'@'localhost';")) {
					throw new \RuntimeException("Error granting privileges: " . $mysqli->error);
				}

				$this->info("  → Flushing privileges...");
				$mysqli->query("FLUSH PRIVILEGES;");

				$this->info("  ✓ Database setup completed successfully");
				return true; // Task completed successfully

			} finally {
				// 4. Close connection
				$mysqli->close();
			}
		});
	}

	private function createNginxRecord($storeId, $mage_root): void
	{
		$this->task("Setting up Nginx configuration for {$storeId}.aj-group.ps", function () use ($mage_root, $storeId) {
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

			$this->info("  → Creating Nginx configuration file...");
			$cmd = "echo " . escapeshellarg($nginx_conf_content) . " | sudo tee $nginx_conf";
			exec($cmd, $output, $return_var);

			if ($return_var !== 0) {
				throw new \RuntimeException("Failed to create Nginx configuration file");
			}

			$this->info("  → Creating symbolic link to sites-enabled...");
			$target = $nginx_conf;
			$link = "/etc/nginx/sites-enabled/{$storeId}.aj-group.ps";

			exec("sudo ln -s $target $link", $output, $return_var);
			if ($return_var !== 0) {
				throw new \RuntimeException("Failed to create symbolic link for Nginx site");
			}

			$this->info("  → Testing Nginx configuration...");
			exec("sudo nginx -t 2>&1", $testOutput, $testReturn);

			if ($testReturn === 0) {
				$this->info("  → Reloading Nginx...");
				exec("sudo nginx -s reload 2>&1", $reloadOutput, $reloadReturn);

				if ($reloadReturn !== 0) {
					throw new \RuntimeException("Nginx reload failed: " . implode("\n", $reloadOutput));
				}

				$this->info("  ✓ Nginx configuration created and reloaded successfully");
			} else {
				throw new \RuntimeException("Nginx config test failed:\n" . implode("\n", $testOutput));
			}

			return true;
		});
	}


	private function installMagento(
		$mage_root,
		$baseurl,
		$dbHost,
		$storeId,
		$user,
		$pass,
		$adminFirstName,
		$adminLastName,
		$adminEmail,
		$backendFrontName,
		$language,
		$currency,
		$timezone,
		$osHost,
		$osPort,
		$osPass): void
	{
		$this->task("Installing Magento for store: {$storeId}", function () use ($mage_root, $baseurl, $dbHost, $storeId, $user, $pass, $adminFirstName, $adminLastName, $adminEmail, $backendFrontName, $language, $currency, $timezone, $osHost, $osPort, $osPass) {
			$this->info("  → Preparing Magento installation command...");

			$cmd = "sudo php {$mage_root}/bin/magento setup:install "
				. "--cleanup-database "
				. "--base-url={$baseurl} "
				. "--db-host={$dbHost} "
				. "--db-name={$storeId} "
				. "--db-user={$user} "
				. "--db-password={$pass} "
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
				. "--opensearch-password={$osPass} "
				. "--opensearch-timeout=300 ";

			$this->info("  → Running Magento installation (this may take several minutes)...");
			$this->line("    <fg=gray>Database: {$storeId} on {$dbHost}</>");
			$this->line("    <fg=gray>Admin URL: {$baseurl}{$backendFrontName}</>");
			$this->line("    <fg=gray>Search Engine: OpenSearch on {$osHost}:{$osPort}</>");

			exec($cmd . " 2>&1", $output, $return_var);

			if ($return_var !== 0) {
				$errorOutput = implode("\n", $output);
				throw new \RuntimeException("Magento installation failed:\n{$errorOutput}");
			}

			$this->info("  ✓ Magento installation completed successfully");

			// Optionally show some key output lines
			$relevantOutput = array_filter($output, function ($line) {
				return str_contains($line, 'SUCCESS') ||
					str_contains($line, 'Admin URI') ||
					str_contains($line, 'Frontend URI');
			});

			if (!empty($relevantOutput)) {
				$this->line("    <fg=green>" . implode("\n    ", $relevantOutput) . "</>");
			}

			return true;
		});
	}

	private function deploySampleData($mage_root): void
	{
		$this->task("Deploying Magento sample data", function () use ($mage_root) {
			$this->info("  → Preparing sample data deployment with increased memory limit...");

			// Increase memory limit for sample data deployment
			$deployCmd = "sudo php -d memory_limit=2G $mage_root/bin/magento sampledata:deploy";

			$this->info("  → Running sample data deployment (this may take several minutes)...");
			$this->line("    <fg=gray>Memory limit: 2GB</>");
			$this->line("    <fg=gray>Command: sampledata:deploy</>");

			exec($deployCmd . " 2>&1", $sampleOutput, $sampleReturnVar);

			if ($sampleReturnVar !== 0) {
				$errorOutput = implode("\n", $sampleOutput);
				throw new \RuntimeException("Sample data deployment failed:\n{$errorOutput}");
			}

			$this->info("  ✓ Sample data deployed successfully");

			// Show any relevant output messages
			$relevantOutput = array_filter($sampleOutput, function($line) {
				return str_contains($line, 'successfully') ||
					str_contains($line, 'Complete') ||
					str_contains($line, 'Finished') ||
					str_contains($line, 'deployed');
			});

			if (!empty($relevantOutput)) {
				$this->line("    <fg=green>" . implode("\n    ", $relevantOutput) . "</>");
			}

			return true;
		});
	}

	private function fixPermissions($mage_root): void
	{
		$this->task("Fixing file permissions for Magento directory", function () use ($mage_root) {
			$this->info("  → Changing ownership to www-data...");
			exec("sudo chown -R www-data:www-data $mage_root", $chownOutput, $chownReturn);

			if ($chownReturn !== 0) {
				$errorOutput = implode("\n", $chownOutput);
				throw new \RuntimeException("Failed to change ownership:\n{$errorOutput}");
			}

			$this->info("  → Setting file permissions to 644...");
			exec("sudo find $mage_root -type f -exec chmod 644 {} +", $fileOutput, $fileReturn);

			if ($fileReturn !== 0) {
				$errorOutput = implode("\n", $fileOutput);
				throw new \RuntimeException("Failed to set file permissions:\n{$errorOutput}");
			}

			$this->info("  → Setting directory permissions to 755...");
			exec("sudo find $mage_root -type d -exec chmod 755 {} +", $dirOutput, $dirReturn);

			if ($dirReturn !== 0) {
				$errorOutput = implode("\n", $dirOutput);
				throw new \RuntimeException("Failed to set directory permissions:\n{$errorOutput}");
			}

			$this->info("  ✓ File permissions fixed successfully");
			$this->line("    <fg=gray>Owner: www-data:www-data</>");
			$this->line("    <fg=gray>Files: 644 | Directories: 755</>");

			return true;
		});
	}

	private function upgradeStore($mage_root): void
	{
		$this->task("Running Magento setup:upgrade", function () use ($mage_root) {
			$this->info("  → Preparing Magento upgrade after data installation...");

			$upgradeCmd = "php $mage_root/bin/magento setup:upgrade";

			$this->info("  → Running setup:upgrade (this may take a few minutes)...");
			$this->line("    <fg=gray>Command: setup:upgrade</>");
			$this->line("    <fg=gray>This will update database schema and data patches</>");

			exec($upgradeCmd . " 2>&1", $upgradeOutput, $upgradeReturnVar);

			if ($upgradeReturnVar !== 0) {
				$errorOutput = implode("\n", $upgradeOutput);
				throw new \RuntimeException("Magento upgrade failed:\n{$errorOutput}");
			}

			$this->info("  ✓ Magento upgrade completed successfully");

			// Show any relevant output messages
			$relevantOutput = array_filter($upgradeOutput, function($line) {
				return str_contains($line, 'successfully') ||
					str_contains($line, 'Complete') ||
					str_contains($line, 'Nothing to import') ||
					str_contains($line, 'Schema creation/updates') ||
					str_contains($line, 'Data install/update');
			});

			if (!empty($relevantOutput)) {
				$this->line("    <fg=green>" . implode("\n    ", $relevantOutput) . "</>");
			}

			return true;
		});
	}

	private function showResult($baseurl, $backendFrontName): void
	{
		$this->task("Preparing installation summary", function () use ($baseurl, $backendFrontName) {
			$this->info("  → Compiling installation outputs...");

			// Merge outputs for display

			$this->info("  → Generating HTML summary...");

			$htmlOutput = "<div class='p-6 min-h-screen bg-gradient-to-r from-green-400 via-blue-500 to-purple-600 text-white'>";
			$htmlOutput .= "<h2 class='text-2xl font-bold mb-4'>Installer Output</h2>";
			$htmlOutput .= "<p class='mt-4'>URL: <a href='{$baseurl}' class='underline'>{$baseurl}</a></p>";
			$htmlOutput .= "<p class='mt-4'>Admin URL: <a href='{$baseurl}/{$backendFrontName}' class='underline'>{$backendFrontName}</a></p>";
			$htmlOutput .= "<p class='mt-4'>Username: adminaj</p>";
			$htmlOutput .= "<p class='mt-4'>Password: A~12345Jaddou</p>";
			$htmlOutput .= "</div>";

			// Output the HTML
			echo $htmlOutput;

			$this->info("  ✓ Installation summary displayed");

			return true;
		});

		// Also show a clean summary in the console
		$this->newLine();
		$this->line("<fg=green>🎉 Installation Complete!</>");
		$this->newLine();
		$this->line("<fg=cyan>Frontend URL:</> <fg=white>{$baseurl}</>");
		$this->line("<fg=cyan>Admin URL:</> <fg=white>{$baseurl}/{$backendFrontName}</>");
		$this->line("<fg=cyan>Username:</> <fg=white>adminaj</>");
		$this->line("<fg=cyan>Password:</> <fg=white>A~12345Jaddou</>");
		$this->newLine();
	}
}
