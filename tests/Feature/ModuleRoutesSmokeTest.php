<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ModuleRoutesSmokeTest extends TestCase
{
    public function test_core_module_form_routes_exist(): void
    {
        $routeNames = [
            // Site
            'site.contato-envia',
            'site.newsletter',

            // Auth / Company complement
            'sysCompany.storeComplementRegister',
            'sysCompany.photoStore',

            // Exchange
            'exchange.request.offer-store',
            'exchange.request.close',
            'exchange.request.cancelation',
            'exchange.request.closed',

            // Certificates / documents
            'sysCompany.certificates.storeRequestCertificate',
            'sysCompany.certificates.sendMessageRequestCertificate',

            // Admin modules
            'productCategories.store',
            'productCategories.update',
            'users.update_password',
            'users.indexEmpresa',
            'companies.disapprove',
        ];

        foreach ($routeNames as $routeName) {
            $this->assertTrue(Route::has($routeName), "Route '{$routeName}' should exist.");
        }
    }
}
