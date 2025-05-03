<?php
namespace App\Console;

use App\Services\PostFetcher;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            Log::info('PostFetcher job running at ' . now());
            app(PostFetcher::class)->fetchAllSources();
        })->everyFifteenMinutes()->name('FetchPosts');
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
