<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionAddTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // PRODUCTS
        Permission::create(['name' => 'products.show', 'guard_name' => 'web']);
        Permission::create(['name' => 'products.store', 'guard_name' => 'web']);
        Permission::create(['name' => 'products.edit', 'guard_name' => 'web']);
        Permission::create(['name' => 'products.update', 'guard_name' => 'web']);
        Permission::create(['name' => 'products.destroy', 'guard_name' => 'web']);

        $adminUserRole = Role::findByName('admin');

        $show = Permission::findByName('products.show');
        $store = Permission::findByName('products.store');
        $edit = Permission::findByName('products.edit');
        $update = Permission::findByName('products.update');
        $destroy = Permission::findByName('products.destroy');

        $adminUserRole->givePermissionTo($show);
        $adminUserRole->givePermissionTo($store);
        $adminUserRole->givePermissionTo($edit);
        $adminUserRole->givePermissionTo($update);
        $adminUserRole->givePermissionTo($destroy);
    }
}
