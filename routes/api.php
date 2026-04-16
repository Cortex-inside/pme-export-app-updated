<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
| Registered under the "api" middleware group in bootstrap/app.php.
| Authentication uses Laravel Passport (auth:api guard).
|
| Note: 'cors' middleware is now handled globally by HandleCors (built-in).
| It no longer needs to be listed per-group.
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('company')->middleware('auth:api')->group(function () {
    Route::get('/verifyIsCompany', ['as' => 'api.company.verifyIsCompany',  'uses' => 'CompanyController@verifyIsCompany']);
    Route::get('/certificates',    ['as' => 'api.company.certificates',     'uses' => 'CertificateController@getCertificatesFromCompany']);
});

Route::prefix('certificates')->middleware('auth:api')->group(function () {
    Route::get('/listOfCertificates',           ['as' => 'api.certificates.listOfCertificates',     'uses' => 'CertificateController@listOfCertificates']);
    Route::get('/listOfCertificates/{certificate}', ['as' => 'api.certificates.listOfCertificatesShow', 'uses' => 'CertificateController@listOfCertificatesShow']);
    Route::post('/storeRequestCertificate',     ['as' => 'api.certificates.storeRequestCertificateFromApp', 'uses' => 'CertificateController@storeRequestCertificateFromApp']);
});

// Public endpoints
Route::get('/list-certificates', ['as' => 'api.company.listCertificates', 'uses' => 'CertificateController@listaCertificado']);
Route::get('/products',          ['as' => 'api.company.listProd',         'uses' => 'ProductController@products']);
