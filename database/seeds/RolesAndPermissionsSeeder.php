<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
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

        // create permissions
        Permission::create(['name' => 'read publications']);
        Permission::create(['name' => 'create publications']);
        Permission::create(['name' => 'update publications']);
        Permission::create(['name' => 'delete publications']);
        Permission::create(['name' => 'enable publications']);
        Permission::create(['name' => 'disable publications']);

        Permission::create(['name' => 'read users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);
        

        // create first role with all permissions        
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        // 2nd role just for example        
        $staff = Role::create(['name' => 'staff']);
        $staff->givePermissionTo([
            'read publications',
            'create publications',
            'update publications'
        ]);
    }
}
