<?php

namespace PMEexport\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     * Laravel 12 auto-discovers policies; explicit mapping only needed for overrides.
     *
     * @var array
     */
    protected $policies = [
        // 'PMEexport\Models\Model' => 'PMEexport\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        // registerPolicies() was removed in Laravel 12.
        // Policies are now auto-discovered from app/Policies.
    }
}
