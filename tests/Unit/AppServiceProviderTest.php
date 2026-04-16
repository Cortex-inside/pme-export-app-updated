<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\URL;
use PMEexport\Providers\AppServiceProvider;
use Tests\TestCase;

class AppServiceProviderTest extends TestCase
{
    /**
     * URL::forceScheme('https') is called when the app environment is production.
     */
    public function test_force_scheme_is_called_in_production(): void
    {
        config(['app.env' => 'production']);

        URL::shouldReceive('forceScheme')->once()->with('https');

        (new AppServiceProvider($this->app))->boot();
    }

    /**
     * URL::forceScheme is NOT called outside production.
     *
     * @dataProvider nonProductionEnvironments
     */
    public function test_force_scheme_not_called_outside_production(string $env): void
    {
        config(['app.env' => $env]);

        URL::shouldReceive('forceScheme')->never();

        (new AppServiceProvider($this->app))->boot();
    }

    public static function nonProductionEnvironments(): array
    {
        return [
            'local'   => ['local'],
            'staging' => ['staging'],
            'testing' => ['testing'],
        ];
    }
}
