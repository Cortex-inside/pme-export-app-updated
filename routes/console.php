<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

/*
|--------------------------------------------------------------------------
| Console Routes (Laravel 12)
|--------------------------------------------------------------------------
| Define Closure-based Artisan commands and scheduled tasks here.
| The Console Kernel was removed in Laravel 12 — scheduling is done
| directly via Schedule:: in this file.
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Example scheduled task — uncomment and adapt as needed:
// Schedule::command('queue:work --stop-when-empty')->everyMinute()->withoutOverlapping();
