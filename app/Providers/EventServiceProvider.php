<?php

namespace PMEexport\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Add your event => listener mappings here.
        // Example:
        // \PMEexport\Events\SomeEvent::class => [
        //     \PMEexport\Listeners\SomeListener::class,
        // ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
