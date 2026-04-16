<?php

namespace PMEexport\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use PMEexport\Models\Cae;
use PMEexport\Models\Certificate;
use PMEexport\Models\CertificateCategory;
use PMEexport\Models\Company;
use PMEexport\Models\CompanyAnnouncement;
use PMEexport\Models\Department;
use PMEexport\Models\District;
use PMEexport\Models\Product;
use PMEexport\Models\ProductCategory;
use PMEexport\Models\Province;
use PMEexport\Models\RequestAnnouncement;
use PMEexport\Models\User;

/**
 * Laravel 12 compatible RouteServiceProvider.
 * Extends ServiceProvider directly (RouteServiceProvider base class removed in Laravel 12).
 * Route registration is handled in bootstrap/app.php via ->withRouting().
 * This provider handles route model bindings and rate limiters only.
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->configureModelBindings();
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    /**
     * Configure route model bindings.
     * All models are resolved by UUID instead of numeric primary key.
     */
    protected function configureModelBindings(): void
    {
        Route::bind('product', function ($value) {
            return Product::where('uuid', $value)->firstOrFail();
        });

        Route::bind('productCategory', function ($value) {
            return ProductCategory::where('uuid', $value)->firstOrFail();
        });

        Route::bind('department', function ($value) {
            return Department::where('uuid', $value)->firstOrFail();
        });

        Route::bind('province', function ($value) {
            return Province::where('uuid', $value)->firstOrFail();
        });

        Route::bind('cae', function ($value) {
            return Cae::where('uuid', $value)->firstOrFail();
        });

        Route::bind('district', function ($value) {
            return District::where('uuid', $value)->firstOrFail();
        });

        Route::bind('announcement', function ($value) {
            return CompanyAnnouncement::where('uuid', $value)->firstOrFail();
        });

        Route::bind('announcement_request', function ($value) {
            return RequestAnnouncement::where('uuid', $value)->firstOrFail();
        });

        Route::bind('certificate', function ($value) {
            return Certificate::where('uuid', $value)->firstOrFail();
        });

        Route::bind('company', function ($value) {
            return Company::where('uuid', $value)->firstOrFail();
        });

        Route::bind('user', function ($value) {
            return User::where('uuid', $value)->firstOrFail();
        });

        Route::bind('certificateCategories', function ($value) {
            return CertificateCategory::where('uuid', $value)->firstOrFail();
        });
    }
}
