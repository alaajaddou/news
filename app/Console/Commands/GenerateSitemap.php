<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
	protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
	protected $description = 'Generate sitemap for all pages';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
	    $sitemap = Sitemap::create();

	    // Add static URLs (homepage, about, contact etc)
	    $sitemap->add(Url::create('/'));
	    $sitemap->add(Url::create('/about'));
	    $sitemap->add(Url::create('/services'));
	    $sitemap->add(Url::create('/blog'));
	    $sitemap->add(Url::create('/contact'));


		Post::all()->each(function ($post) use ($sitemap) {
			$sitemap->add(Url::create("/blog/{$post->slug}")
				->setLastModificationDate($post->updated_at)
				->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
				->setPriority(0.8));
		});

	    $sitemap->writeToFile(public_path('sitemap.xml'));

	    $this->info('Sitemap generated successfully!');
    }
}
