<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);

        // create roles and assign existing permissions
        Role::create(['name' => 'lansia']);

        // $role1->givePermissionTo('edit');
        // $role1->givePermissionTo('delete');

        Role::create(['name' => 'pembimbing']);
        // $role2->givePermissionTo('publish');
        // $role2->givePermissionTo('unpublish');

        Role::create(['name' => 'pimpinan']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider


    }
}
