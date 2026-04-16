<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionAdd3TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'users.indexEmpresa', 'guard_name' => 'web']);

        Permission::create(['name' => 'provinces.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'provinces.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'provinces.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'provinces.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'provinces.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'provinces.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'provinces.destroy', 'guard_name' => 'web']);

        Permission::create(['name' => 'districts.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'districts.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'districts.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'districts.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'districts.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'districts.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'districts.destroy', 'guard_name' => 'web']);

        Permission::create(['name' => 'caes.index', 'guard_name' => 'web']);
        Permission::create(['name' => 'caes.create', 'guard_name' => 'web']);
        Permission::create(['name' => 'caes.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'caes.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'caes.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'caes.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'caes.destroy', 'guard_name' => 'web']);

        $adminUserRole = Role::findByName('admin');

        $adminUserRole->givePermissionTo(Permission::findByName('users.indexEmpresa'));

        // PROVINCES
        $adminUserRole->givePermissionTo(Permission::findByName('provinces.index'));
        $adminUserRole->givePermissionTo(Permission::findByName('provinces.create'));
        $adminUserRole->givePermissionTo(Permission::findByName('provinces.show'));
        $adminUserRole->givePermissionTo(Permission::findByName('provinces.store'));
        $adminUserRole->givePermissionTo(Permission::findByName('provinces.edit'));
        $adminUserRole->givePermissionTo(Permission::findByName('provinces.update'));

        // DISTRICTS
        $adminUserRole->givePermissionTo(Permission::findByName('districts.index'));
        $adminUserRole->givePermissionTo(Permission::findByName('districts.create'));
        $adminUserRole->givePermissionTo(Permission::findByName('districts.show'));
        $adminUserRole->givePermissionTo(Permission::findByName('districts.store'));
        $adminUserRole->givePermissionTo(Permission::findByName('districts.edit'));
        $adminUserRole->givePermissionTo(Permission::findByName('districts.update'));

        // CAES
        $adminUserRole->givePermissionTo(Permission::findByName('caes.index'));
        $adminUserRole->givePermissionTo(Permission::findByName('caes.create'));
        $adminUserRole->givePermissionTo(Permission::findByName('caes.show'));
        $adminUserRole->givePermissionTo(Permission::findByName('caes.store'));
        $adminUserRole->givePermissionTo(Permission::findByName('caes.edit'));
        $adminUserRole->givePermissionTo(Permission::findByName('caes.update'));
    }
}
