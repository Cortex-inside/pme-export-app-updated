<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['locale']], function () {
    Route::get('/', ['as' => 'site.index', 'uses' => 'SiteController@index']);
    Route::get('/contato', ["as" => "site.contato", "uses" => "ContatoController@contato"]);
    Route::get('/suporte', function () {
        return redirect()->route('site.contato');
    })->name('site.suporte');
    Route::view('/faq', 'site.faq')->name('site.faq');
    Route::post('/contato', ["as" => "site.contato-envia", "uses" => "ContatoController@contatoEnvia"]);
    Route::get('/sobre', ["as" => "site.sobre", "uses" => "HomeController@about"]);
    Route::get('/produtos', ["as" => "site.produtos", "uses" => "ProdutoController@index"]);
    Route::get('/certificacao-online', ["as" => "site.certificacao-online", "uses" => "CertificacaoController@online"]);
    Route::get('/club-pme', ["as" => "site.club-pme", "uses" => "CertificacaoController@club"]);
    Route::post('/newsletter', ["as" => "site.newsletter", "uses" => "NewsletterController@store"]);
    Route::get('/parceiros', ["as" => "site.parceiros", "uses" => "ParceiroController@index"]);
});

//ALTERAR LOCALE
Route::get('/lang/{key}', function ($key) {
    session()->put('locale', $key);
    return redirect()->route("dashboard");
})->name("change.language");

Route::get('/home', function () {
    return redirect("/exchange");
});

Auth::routes();

Route::resource('legalSituations', 'LegalSituationController');

Route::group(['prefix' => 'productCategories'], function () {
    Route::get('/export/pcategory', ["as" => "productCategories.export", "uses" => "ProductCategoryController@export"]);
});

Route::group(['middleware'=>['auth','RedirectIfEmpresa',"locale"]], function () {
    Route::resource('productCategories', 'ProductCategoryController');
    Route::resource('products', 'ProductController');
    Route::resource('requestMessages', 'RequestMessageController');
    Route::resource('requestProducts', 'RequestProductController');
    Route::resource('companyCaes', 'CompanyCaeController');
});

Route::group(['prefix' => 'admin','middleware'=>['auth','RedirectIfEmpresa', "locale"]], function () {

    Route::get('/', ["as"=>"dashboard","uses" => "HomeController@index"]);

    //COMPANYCERTIFICATES
    Route::group(['prefix' => 'companyCertificates'], function () {
        Route::get('/pending', ["as"=>"companyCertificates.pending","uses" => "CompanyCertificateController@pending"]);
        Route::get('/approved', ["as"=>"companyCertificates.approved","uses" => "CompanyCertificateController@approved"]);
        Route::get('/disapproved', ["as"=>"companyCertificates.disapproved","uses" => "CompanyCertificateController@disapproved"]);
        Route::get('/inProgress', ["as"=>"companyCertificates.inProgress","uses" => "CompanyCertificateController@inProgress"]);
        Route::get('/startAnalyze/{companyCertificate}', ["as"=>"companyCertificates.startAnalyze","uses" => "CompanyCertificateController@startAnalyze"]);
        Route::get('/approve/{companyCertificate}', ["as"=>"companyCertificates.approve","uses" => "CompanyCertificateController@approve"]);
        Route::post('/disapprove/', ["as"=>"companyCertificates.disapprove","uses" => "CompanyCertificateController@disapprove"]);
    });
    //Empresas

    Route::group(['prefix' => 'companies'], function () {
        Route::get('/pending', ["as"=>"companies.pending","uses" => "CompanyController@pending"]);
        Route::get('/approved', ["as"=>"companies.approved","uses" => "CompanyController@approved"]);
        Route::get('/disapproved', ["as"=>"companies.disapproved","uses" => "CompanyController@disapproved"]);
    });

    Route::resource('companies', 'CompanyController');

    //Exigencias
    Route::resource('requirements', 'RequirementController');

    //Certificados
    Route::group(['prefix' => 'certificates'], function () {
        Route::get('/export/certificates', ["as" => "certificates.export", "uses" => "CertificateController@export"]);
    });
    Route::resource('certificates', 'CertificateController');

    //PERMISSIONS
    Route::group(['prefix' => 'permissions'], function () {
        Route::get('/', ["as"=>"permissions.index","uses" => "PermissionController@index",'middleware'=>['permission:permissions.index']]);
        Route::post('/', ["as"=>"permissions.store","uses" => "PermissionController@store"]);
        Route::get('/create', ["as"=>"permissions.create","uses" => "PermissionController@create",'middleware'=>['permission:permissions.create']]);
        Route::get('/{permission}', ["as"=>"permissions.show","uses" => "PermissionController@show",'middleware'=>['permission:permissions.show']]);
        Route::put('/{permission}', ["as"=>"permissions.update","uses" => "PermissionController@update"]);
        Route::get('/{permission}/edit', ["as"=>"permissions.edit","uses" => "PermissionController@edit",'middleware'=>['permission:permissions.edit']]);
        Route::delete('/{permission}', ["as"=>"permissions.destroy","uses" => "PermissionController@destroy",'middleware'=>['permission:permissions.destroy']]);
    });

    //ROLES
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', ["as"=>"roles.index","uses" => "RoleController@index",'middleware'=>['permission:roles.index']]);
        Route::post('/', ["as"=>"roles.store","uses" => "RoleController@store"]);
        Route::get('/create', ["as"=>"roles.create","uses" => "RoleController@create",'middleware'=>['permission:roles.create']]);
        Route::get('/{role}', ["as"=>"roles.show","uses" => "RoleController@show",'middleware'=>['permission:roles.show']]);
        Route::put('/{role}', ["as"=>"roles.update","uses" => "RoleController@update"]);
        Route::get('/{role}/edit', ["as"=>"roles.edit","uses" => "RoleController@edit",'middleware'=>['permission:roles.edit']]);
        Route::delete('/{role}', ["as"=>"roles.destroy","uses" => "RoleController@destroy",'middleware'=>['permission:roles.destroy']]);

        Route::put('/permission/{id}', ["as"=>"roles.permission.update","uses" => "RoleController@permissionUpdate"]);
    });

    //USERS
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ["as"=>"users.index","uses" => "UserController@index",'middleware'=>['permission:users.index']]);
        Route::get('/index-empresa', ["as"=>"users.indexEmpresa","uses" => "UserController@indexEmpresa",'middleware'=>['permission:users.index']]);
        Route::get('/create', ["as"=>"users.create","uses" => "UserController@create",'middleware'=>['permission:users.create']]);
        Route::post('/', ["as"=>"users.store","uses" => "UserController@store"]);
        Route::get('/{user}', ["as"=>"users.show","uses" => "UserController@show",'middleware'=>['permission:users.show']]);
        Route::put('/{user}', ["as"=>"users.update","uses" => "UserController@update"]);
        Route::get('/{user}/edit', ["as"=>"users.edit","uses" => "UserController@edit",'middleware'=>['permission:users.edit']]);
        Route::delete('/{user}', ["as"=>"users.destroy","uses" => "UserController@destroy",'middleware'=>['permission:users.destroy']]);
        Route::get('/change_password/{user}', ["as"=>"users.change_password","uses" => "UserController@changePassword",'middleware'=>['permission:users.change_password']]);
        Route::put('/update_password/{user}', ["as"=>"users.update_password","uses" => "UserController@updatePassword",'middleware'=>['permission:users.change_password']]);
    });

    //GROUP USERS
    Route::group(['prefix' => 'group_users'], function () {
        Route::get('/', ["as"=>"group_users.index","uses" => "GroupUserController@index",'middleware'=>['permission:group_user.index']]);
    });

    //DEPARTMENTS
    Route::resource('departments', 'DepartmentController');

    //PROVINCES
    Route::resource('provinces', 'ProvinceController');

    //DISTRICTS
    Route::resource('districts', 'DistrictController');

    //CAES
    Route::resource('caes', 'CaeController');

    //REQUIREMENTS

    //CERTIFICATECATEGORY
//    Route::resource('certificateCategories', 'CertificateCategoryController');
    Route::group(['prefix' => 'certificateCategories'], function () {

        Route::get('/', ["as"=>"certificateCategories.index","uses" => "CertificateCategoryController@index",'middleware'=>['permission:certificateCategories.index']]);
        Route::post('/', ["as"=>"certificateCategories.store","uses" => "CertificateCategoryController@store"]);
        Route::get('/create', ["as"=>"certificateCategories.create","uses" => "CertificateCategoryController@create",'middleware'=>['permission:certificateCategories.create']]);
        Route::get('/{certificateCategories}', ["as"=>"certificateCategories.show","uses" => "CertificateCategoryController@show",'middleware'=>['permission:certificateCategories.show']]);
        Route::put('/{certificateCategories}', ["as"=>"certificateCategories.update","uses" => "CertificateCategoryController@update"]);
        Route::get('/{certificateCategories}/edit', ["as"=>"certificateCategories.edit","uses" => "CertificateCategoryController@edit",'middleware'=>['permission:certificateCategories.edit']]);
        Route::delete('/{certificateCategories}', ["as"=>"certificateCategories.destroy","uses" => "CertificateCategoryController@destroy",'middleware'=>['permission:certificateCategories.destroy']]);

    });


    Route::resource('companyCertificates', 'CompanyCertificateController');

    //COMPANY
    Route::group(['prefix' => 'companies'], function () {
        Route::get('/pending', ["as"=>"companies.pending","uses" => "CompanyController@pending"]);
        Route::get('/approved', ["as"=>"companies.approved","uses" => "CompanyController@approved"]);
        Route::get('/disapproved', ["as"=>"companies.disapproved","uses" => "CompanyController@disapproved"]);
        Route::get('/approve/{company}', ["as"=>"companies.approve","uses" => "CompanyController@approve"]);
        Route::post('/disapprove/', ["as"=>"companies.disapprove","uses" => "CompanyController@disapprove"]);
    });

});

Route::group(['prefix' => 'exchange', 'middleware' => ['auth', 'RedirectIfEmpresa', 'locale']], function () {

    Route::get('/', ["as" => "exchange.index", "uses" => "HomeController@index"]);
    Route::get('/offer-detail/{announcement}', ["as" => "exchange.offer-detail", "uses" => "OfferController@detail"]);

    //REQUESTS
    Route::get('/requests', ["as" => "exchange.requests", "uses" => "RequestController@index"]);
    Route::get('/requests-enviados', ["as" => "exchange.requests-enviados", "uses" => "RequestController@enviados"]);
    Route::get('/requests-recebidos', ["as" => "exchange.requests-recebidos", "uses" => "RequestController@recebidos"]);
    Route::get('/requests-todos', ["as" => "exchange.requests-todos", "uses" => "RequestController@todos"]);
    Route::get('/requests-fechados', ["as" => "exchange.requests-fechados", "uses" => "RequestController@fechados"]);

    Route::get('/request/detail/{announcement_request}', ["as" => "exchange.request.detail", "uses" => "RequestController@detail"]);
    Route::post('/request/cancelation/{announcement_request}', ["as" => "exchange.request.cancelation", "uses" => "RequestController@cancelation"]);

    Route::post('/request/closed/{announcement_request}', ["as" => "exchange.request.closed", "uses" => "RequestController@closed"]);

    //REQUEST OFFERS
    Route::get('/request/offer/{announcement}', ["as" => "exchange.request.offer", "uses" => "RequestController@offerRequest"]);
    Route::post('/request/offer/{announcement}', ["as" => "exchange.request.offer-store", "uses" => "RequestController@offerStoreRequest"]);

    //REQUEST CLOSE DIRECT
    Route::get('/request/confirm-close/{announcement}', ["as" => "exchange.request.confirm-close", "uses" => "RequestController@confirmCloseRequest"]);
    Route::post('/request/close/{announcement}', ["as" => "exchange.request.close", "uses" => "RequestController@closeRequest"]);

    Route::post('/sendMessage', ["as"=>"exchange.request.sendMessageRequest","uses" => "RequestController@sendMessageRequest"]);


});

Route::group(['prefix' => 'sysCompany','middleware'=>['auth', 'RedirectIfEmpresa', "locale"]], function () {

    //REGISTERCOMPLEMENT
    Route::get('/complementRegister', ["as"=>"sysCompany.complementRegister","uses" => "SysCompanyController@complementRegister"]);
    Route::post('/complementRegister', ["as"=>"sysCompany.storeComplementRegister","uses" => "SysCompanyController@storeComplementRegister"]);

    Route::get('/', ["as"=>"sysCompany.index","uses" => "SysCompanyController@index",'middleware'=>['permission:sysCompany.index']]);
    Route::put('/photo-store/{company}', ["as"=>"sysCompany.photoStore","uses" => "SysCompanyController@photoStore",'middleware'=>['permission:sysCompany.index']]);

    //PRODUCTS
    Route::group(['prefix' => 'announcements'], function () {
        Route::get('/', ["as"=>"sysCompany.companyAnnouncements.indexByCompany","uses" => "CompanyAnnouncementController@indexByCompany",'middleware'=>['permission:sysCompany.companyAnnouncements.indexByCompany']]);
        Route::post('/', ["as"=>"sysCompany.companyAnnouncements.store","uses" => "CompanyAnnouncementController@store",'middleware'=>['permission:sysCompany.companyAnnouncements.create']]);
        Route::get('/create', ["as"=>"sysCompany.companyAnnouncements.create","uses" => "CompanyAnnouncementController@create",'middleware'=>['permission:sysCompany.companyAnnouncements.create']]);
        Route::get('/{announcement}', ["as"=>"sysCompany.companyAnnouncements.show","uses" => "CompanyAnnouncementController@show",'middleware'=>['permission:sysCompany.companyAnnouncements.show']]);
        Route::patch('/{announcement}', ["as"=>"sysCompany.companyAnnouncements.update","uses" => "CompanyAnnouncementController@update"]);
        Route::get('/{announcement}/edit', ["as"=>"sysCompany.companyAnnouncements.edit","uses" => "CompanyAnnouncementController@edit",'middleware'=>['permission:sysCompany.companyAnnouncements.show']]);
        Route::delete('/{announcement}', ["as"=>"sysCompany.companyAnnouncements.destroy","uses" => "CompanyAnnouncementController@destroy",'middleware'=>['permission:sysCompany.companyAnnouncements.destroy']]);
        Route::get('/getProductsByCategory_ajax/{id}', ["as"=>"sysCompany.companyAnnouncements.getProductsByCategory_ajax","uses" => "CompanyAnnouncementController@getProductByCategoryAjax",'middleware'=>['permission:sysCompany.companyAnnouncements.indexByCompany']]);
    });


    //COMPANY
    Route::group(['prefix' => 'company'], function () {
        Route::get('/', ["as"=>"sysCompany.company.index","uses" => "CompanyController@indexMyCompany",'middleware'=>['permission:companies.indexMyCompany']]);
        Route::get('/change_password/{user}', ["as"=>"sysCompany.company.users.change_password","uses" => "CompanyController@changePassword",'middleware'=>['permission:companies.changePassword']]);
        Route::put('/update_password/{user}', ["as"=>"sysCompany.company.users.update_password","uses" => "CompanyController@updatePassword",'middleware'=>['permission:companies.changePassword']]);

        Route::group(['prefix' => 'companyPartners'], function () {
            Route::get('/', ["as"=>"companyPartners.index","uses" => "CompanyPartnerController@index"])->middleware(['permission:companyPartners.index']);
            Route::post('/', ["as"=>"companyPartners.store","uses" => "CompanyPartnerController@store"])->middleware(['permission:companyPartners.store']);
            Route::get('/create', ["as"=>"companyPartners.create","uses" => "CompanyPartnerController@create"])->middleware(['permission:companyPartners.create']);
            Route::get('/{companyPartners}', ["as"=>"companyPartners.show","uses" => "CompanyPartnerController@show"])->middleware(['permission:companyPartners.show']);
            Route::patch('/{companyPartners}', ["as"=>"companyPartners.update","uses" => "CompanyPartnerController@update"])->middleware(['permission:companyPartners.update']);
            Route::get('/{companyPartners}/edit', ["as"=>"companyPartners.edit","uses" => "CompanyPartnerController@edit"])->middleware(['permission:companyPartners.edit']);
            Route::delete('/{companyPartners}', ["as"=>"companyPartners.destroy","uses" => "CompanyPartnerController@destroy"])->middleware(['permission:companyPartners.destroy']);
        });

        Route::group(['prefix' => 'companyRepresentatives'], function () {
            Route::get('/', ["as"=>"companyRepresentatives.index","uses" => "CompanyRepresentativeController@index"])->middleware(['permission:companyRepresentatives.index']);
            Route::post('/', ["as"=>"companyRepresentatives.store","uses" => "CompanyRepresentativeController@store"])->middleware(['permission:companyRepresentatives.store']);
            Route::get('/create', ["as"=>"companyRepresentatives.create","uses" => "CompanyRepresentativeController@create"])->middleware(['permission:companyRepresentatives.create']);
            Route::get('/{companyRepresentatives}', ["as"=>"companyRepresentatives.show","uses" => "CompanyRepresentativeController@show"])->middleware(['permission:companyRepresentatives.show']);
            Route::patch('/{companyRepresentatives}', ["as"=>"companyRepresentatives.update","uses" => "CompanyRepresentativeController@update"])->middleware(['permission:companyRepresentatives.update']);
            Route::get('/{companyRepresentatives}/edit', ["as"=>"companyRepresentatives.edit","uses" => "CompanyRepresentativeController@edit"])->middleware(['permission:companyRepresentatives.edit']);
            Route::delete('/{companyRepresentatives}', ["as"=>"companyRepresentatives.destroy","uses" => "CompanyRepresentativeController@destroy"])->middleware(['permission:companyRepresentatives.destroy']);
        });

//        Route::resource('companyRepresentatives', 'CompanyRepresentativeController');
//        Route::resource('companyEmails', 'CompanyEmailController');
//        Route::resource('companyPhones', 'CompanyPhoneController');

    });

    //CERTIFICATES
    Route::group(['prefix' => 'certificates'], function () {
        Route::get('/', ["as"=>"sysCompany.certificates.index","uses" => "CertificateController@indexCompany"])->middleware(['permission:certificates.index']);
        Route::get('/requestCertificate/{certificate}', ["as"=>"sysCompany.certificates.requestCertificate", "uses" => "CertificateController@requestCertificate"])->middleware(['permission:certificates.show']);
        Route::post('/', ["as"=>"sysCompany.certificates.storeRequestCertificate","uses" => "CertificateController@storeRequestCertificate"])->middleware(['permission:certificates.create']);
        Route::get('/myCertificates', ["as"=>"sysCompany.certificates.myCertificates","uses" => "CertificateController@certificatesFromCompany"])->middleware(['permission:companyCertificates.index']);
        Route::get('/myCertificates/{companyCertificate}', ["as"=>"sysCompany.certificates.showMyCertificates","uses" => "CertificateController@showCertificateToCompany"])->middleware(['permission:companyCertificates.index']);
        Route::get('/myCertificates-imprimir/{cCertificate}', ["as"=>"sysCompany.certificates.showMyCertificates-imprimir","uses" => "CertificateController@imprimir"])->middleware(['permission:companyCertificates.index']);
        Route::post('/sendMessage', ["as"=>"sysCompany.certificates.sendMessageRequestCertificate","uses" => "CertificateController@sendMessageRequestCertificate"])->middleware(['permission:companyCertificates.index']);
    });

});

Route::group(['middleware'=>['auth','RedirectIfEmpresa',"locale"]], function () {

    Route::resource('documents', 'DocumentController');

    Route::resource('certificateRequirements', 'CertificateRequirementController');

    Route::resource('companyCertificateMessages', 'CompanyCertificateMessageController');
});
