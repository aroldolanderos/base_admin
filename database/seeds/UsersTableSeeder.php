<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentDate = Carbon::now()->format('Y-m-d H:i:s');

        $admin = new User();
        $admin->name = 'Mr. Admin';
        $admin->email = 'admin@gmail.com'; 
        $admin->password = Hash::make('12345');
        $admin->created_at = $currentDate;
        $admin->updated_at = $currentDate;
        $admin->save();

        $admin->assignRole('super-admin');
        
        $staff = new User();
        $staff->name = 'Mr. Staff';
        $staff->email = 'staff@gmail.com'; 
        $staff->password = Hash::make('12345');
        $staff->created_at = $currentDate;
        $staff->updated_at = $currentDate;
        $staff->save();

        $staff->assignRole('staff');
    }
}
