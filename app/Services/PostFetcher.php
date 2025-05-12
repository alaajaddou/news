<?php

namespace App\Services;


use App\Jobs\FetchSourceJob;
use App\Models\Post;
use App\Models\Source;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use willvincent\Feeds\Facades\FeedsFacade;

class PostFetcher
{
    public function fetchAllSources(): void
    {
	    $sources = Source::all();

	    foreach ($sources as $source) {
		    FetchSourceJob::dispatch($source);
	    }
    }

    public function fetchSource(Source $source): void
    {
        try {
            Log::info("Fetching started for RSS source: {$source->name} ({$source->url})");

            $feed = FeedsFacade::make($source->url);
            $items = $feed->get_items();
            $mapping = json_decode($source->field_mapping, true); // e.g. ['id' => 'get_id', 'title' => 'get_title']

            Log::info("Received " . count($items) . " items from RSS source: {$source->name}");

            $newCount = 0;

            foreach ($items as $item) {
                $url = method_exists($item, $mapping['url']) ? $item->{$mapping['url']}() : null;
                Log::info("Received $url");
                if (!$url || Post::where('url', $url)->exists()) {
                    continue;
                }

                Log::info("Creating Post Array");
                $post = [
                    'title' => method_exists($item, $mapping['title']) ? $item->{$mapping['title']}() : 'Untitled',
                    'url' => $url,
                    'content' => method_exists($item, $mapping['content']) ? $item->{$mapping['content']}() : '-----',
                    'source_name' => $source->name,
                    'published_at' => isset($mapping['published_at']) && method_exists($item, $mapping['published_at'])
                        ? Carbon::parse($item->{$mapping['published_at']}('Y-m-d H:i:s'))
                        : now(),
                ];

                Log::info("Check if post after the date.");
                if (isset($source->published_at) && $post['published_at'].lessThanOrEqualTo($source->published_at)) {
                    continue;
                }

                Log::info("Create the post.");
                Post::create($post);

                Log::info("Update the last fetched ID");
                $source->update(['last_fetched_id' => $post['published_at']]);
                $source->save();

                $newCount++;
            }

            Log::info("Finished fetching {$newCount} new posts from RSS source: {$source->name}");
        } catch (\Exception $e) {
            Log::error("Failed to fetch RSS from source {$source->name}: " . $e->getMessage());
        }
    }
}
