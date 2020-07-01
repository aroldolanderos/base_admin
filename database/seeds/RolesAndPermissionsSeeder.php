<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo(Permission::all());

        // 2nd role just for example        
        $staffRole = Role::create(['name' => 'staff']);
        $staffRole->givePermissionTo([
            'read publications',
            'create publications',
            'update publications'
        ]);

        // create demo admin user
        $adminUser = Factory(App\User::class)->create([
            'name' => 'Mr Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345'),
        ]);

        // create demo staff user
        $staffUser = Factory(App\User::class)->create([
            'name' => 'Mr Staff',
            'email' => 'staff@example.com',
            'password' => Hash::make('12345'),
        ]);

        $adminUser->assignRole($adminRole);
        $staffUser->assignRole($staffRole);
    }
}
