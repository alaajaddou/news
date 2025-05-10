<?php

namespace App\Jobs;

use App\Models\Source;
use App\Services\PostFetcher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchSourceJob implements ShouldQueue
{
	use InteractsWithQueue, Queueable, SerializesModels;

	protected Source $source;

	public function __construct(Source $source)
	{
		$this->source = $source;
	}

	public function handle(PostFetcher $fetcher): void
	{
		$fetcher->fetchSource($this->source);
	}
}
