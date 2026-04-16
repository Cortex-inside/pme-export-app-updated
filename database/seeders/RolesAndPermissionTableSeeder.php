<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //CRIANDO AS ROLES

        $superUserRole = Role::create(['name' => 'superuser', 'guard_name' => 'web']);
        $adminUserRole = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $departamentoRole = Role::create(['name' => 'departamento', 'guard_name' => 'web']);
        $informaticaRole = Role::create(['name' => 'informatica', 'guard_name' => 'web']);
        $coreRole = Role::create(['name' => 'core', 'guard_name' => 'web']);
        $diretorRole = Role::create(['name' => 'diretor', 'guard_name' => 'web']);
        $empresaRole = Role::create(['name' => 'empresa', 'guard_name' => 'web']);
        $empresaEstrangeiraRole = Role::create(['name' => 'empresa_estrangeira', 'guard_name' => 'web']);

        //CRIANDO AS PERMISSIONS

        //USERS PERMISSIONS
        Permission::create(['name' => 'users.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.destroy', 'guard_name' => 'web']);
        Permission::create(['name' => 'users.change_password', 'guard_name' => 'web']);

        //Certificados da Empresa
        Permission::create(['name' => 'companyCertificates.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyCertificates.pending', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyCertificates.approved', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyCertificates.disapproved', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyCertificates.inProgress', 'guard_name' => 'web']);

        //Certificados
        Permission::create(['name' => 'certificates.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificates.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificates.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificates.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificates.destroy', 'guard_name' => 'web']);

        //Certificados Categoria
        Permission::create(['name' => 'certificateCategories.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificateCategories.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificateCategories.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificateCategories.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'certificateCategories.destroy', 'guard_name' => 'web']);

        //Exigencias
        Permission::create(['name' => 'requirements.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'requirements.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'requirements.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'requirements.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'requirements.destroy', 'guard_name' => 'web']);

        //Empresas
        Permission::create(['name' => 'companies.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.destroy', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.pending', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.approved', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.disapproved', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.change_password', 'guard_name' => 'web']);

        //PERMISSIONS
        Permission::create(['name' => 'permissions.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'permissions.destroy', 'guard_name' => 'web']);

        //ROLES
        Permission::create(['name' => 'roles.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'roles.destroy', 'guard_name' => 'web']);

        Permission::create(['name' => 'exchange.requests', 'guard_name' => 'web']);
        Permission::create(['name' => 'exchange.requests-enviados', 'guard_name' => 'web']);
        Permission::create(['name' => 'exchange.requests-recebidos', 'guard_name' => 'web']);

        //PRODUCTS
        Permission::create(['name' => 'products.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'products.create', 'guard_name' => 'web']);

        //PRODUCT CATEGORY
        Permission::create(['name' => 'productCategories.export', 'guard_name' => 'web']);
        Permission::create(['name' => 'productCategories.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'productCategories.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'productCategories.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'productCategories.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'productCategories.destroy', 'guard_name' => 'web']);

        //ANNOUNCEMENTS
        Permission::create(['name' => 'companyAnnouncements.indexByCompany', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyAnnouncements.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyAnnouncements.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyAnnouncements.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyAnnouncements.destroy', 'guard_name' => 'web']);

        //COMPANY SOCIOS
        Permission::create(['name' => 'companyPartners.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyPartners.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyPartners.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyPartners.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyPartners.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyPartners.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyPartners.destroy', 'guard_name' => 'web']);

        //COMPANY REPRESENTANTES
        Permission::create(['name' => 'companyRepresentatives.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyRepresentatives.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyRepresentatives.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyRepresentatives.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyRepresentatives.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyRepresentatives.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'companyRepresentatives.destroy', 'guard_name' => 'web']);

        //SYSCOMPANY
        Permission::create(['name' => 'sysCompany.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'sysCompany.companyAnnouncements.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'sysCompany.companyAnnouncements.indexByCompany', 'guard_name' => 'web']);
        Permission::create(['name' => 'sysCompany.companyAnnouncements.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'sysCompany.companyAnnouncements.destroy', 'guard_name' => 'web']);

        //REQUESTS
        Permission::create(['name' => 'requests.myShopping', 'guard_name' => 'web']);
        Permission::create(['name' => 'requests.mySales', 'guard_name' => 'web']);

        //COMPANIES
        Permission::create(['name' => 'companies.indexMyCompany', 'guard_name' => 'web']);
        Permission::create(['name' => 'companies.changePassword', 'guard_name' => 'web']);

        //MONITORAMENTO/DASHBOARD
        Permission::create(['name' => 'admin.index', 'guard_name' => 'web']);


        //ROOT ROLE - give admin all permissions except permissions/roles management
        $listPermissions = Permission::all();

        foreach ($listPermissions as $permission) {
            $tipo = explode('.', $permission->name);

            if($tipo[0] == "permissions" || $tipo[0] == "roles") {
            } else {
                $adminUserRole->givePermissionTo($permission);
            }
        }

        $sysCompanyIndex = Permission::findByName('sysCompany.index');
        $sysCompanyCreate = Permission::findByName('sysCompany.companyAnnouncements.create');
        $sysCompanyAnuncioIndex = Permission::findByName('sysCompany.companyAnnouncements.indexByCompany');
        $sysCompanyShowAnuncio = Permission::findByName('sysCompany.companyAnnouncements.show');

        $exchangePedidos = Permission::findByName('exchange.requests');
        $exchangePedidosEnviados = Permission::findByName('exchange.requests-enviados');
        $exchangePedidosRecebidos = Permission::findByName('exchange.requests-recebidos');

        $companyPartnersindex = Permission::findByName('companyPartners.index');
        $companyPartnersshow = Permission::findByName('companyPartners.show');
        $companyPartnerscreate = Permission::findByName('companyPartners.create');
        $companyPartnersstore = Permission::findByName('companyPartners.store');
        $companyPartnersedit = Permission::findByName('companyPartners.edit');
        $companyPartnersupdate = Permission::findByName('companyPartners.update');

        $companyRepresentativesindex = Permission::findByName('companyRepresentatives.index');
        $companyRepresentativesshow = Permission::findByName('companyRepresentatives.show');
        $companyRepresentativescreate = Permission::findByName('companyRepresentatives.create');
        $companyRepresentativesstore = Permission::findByName('companyRepresentatives.store');
        $companyRepresentativesedit = Permission::findByName('companyRepresentatives.edit');
        $companyRepresentativesupdate = Permission::findByName('companyRepresentatives.update');

        $companiesIndexMyCompany = Permission::findByName('companies.indexMyCompany');
        $companiesChangePassword = Permission::findByName('companies.changePassword');
        $certificatesIndex = Permission::findByName('certificates.index');
        $certificatesShow = Permission::findByName('certificates.show');
        $certificatesCreate = Permission::findByName('certificates.create');
        $companyCertificatesIndex = Permission::findByName('companyCertificates.index');


        $empresaRole->givePermissionTo($companiesIndexMyCompany);
        $empresaRole->givePermissionTo($companiesChangePassword);
        $empresaRole->givePermissionTo($certificatesIndex);
        $empresaRole->givePermissionTo($certificatesShow);
        $empresaRole->givePermissionTo($certificatesCreate);
        $empresaRole->givePermissionTo($companyCertificatesIndex);
        $empresaRole->givePermissionTo($exchangePedidos);
        $empresaRole->givePermissionTo($exchangePedidosEnviados);
        $empresaRole->givePermissionTo($exchangePedidosRecebidos);

        //SOCIOS
        $empresaRole->givePermissionTo($companyPartnersindex);
        $empresaRole->givePermissionTo($companyPartnersshow);
        $empresaRole->givePermissionTo($companyPartnerscreate);
        $empresaRole->givePermissionTo($companyPartnersstore);
        $empresaRole->givePermissionTo($companyPartnersedit);
        $empresaRole->givePermissionTo($companyPartnersupdate);

        //Representantes
        $empresaRole->givePermissionTo($companyRepresentativesindex);
        $empresaRole->givePermissionTo($companyRepresentativesshow);
        $empresaRole->givePermissionTo($companyRepresentativescreate);
        $empresaRole->givePermissionTo($companyRepresentativesstore);
        $empresaRole->givePermissionTo($companyRepresentativesedit);
        $empresaRole->givePermissionTo($companyRepresentativesupdate);

        $empresaRole->givePermissionTo($sysCompanyIndex);
        $empresaRole->givePermissionTo($sysCompanyCreate);
        $empresaRole->givePermissionTo($sysCompanyAnuncioIndex);
        $empresaRole->givePermissionTo($sysCompanyShowAnuncio);

        $empresaEstrangeiraRole->givePermissionTo($companiesIndexMyCompany);
        $empresaEstrangeiraRole->givePermissionTo($companiesChangePassword);
        $empresaEstrangeiraRole->givePermissionTo($certificatesIndex);
        $empresaEstrangeiraRole->givePermissionTo($certificatesShow);
        $empresaEstrangeiraRole->givePermissionTo($certificatesCreate);
        $empresaEstrangeiraRole->givePermissionTo($companyCertificatesIndex);
        $empresaEstrangeiraRole->givePermissionTo($exchangePedidos);
        $empresaEstrangeiraRole->givePermissionTo($exchangePedidosEnviados);
        $empresaEstrangeiraRole->givePermissionTo($exchangePedidosRecebidos);

        $empresaEstrangeiraRole->givePermissionTo($sysCompanyIndex);
        $empresaEstrangeiraRole->givePermissionTo($sysCompanyCreate);
        $empresaEstrangeiraRole->givePermissionTo($sysCompanyAnuncioIndex);
        $empresaEstrangeiraRole->givePermissionTo($sysCompanyShowAnuncio);
    }
}
