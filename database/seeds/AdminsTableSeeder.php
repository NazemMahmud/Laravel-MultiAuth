<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\User;
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user           = new User();
        $user->name     = 'Simple user';
        $user->email    = 'simpleuser@gmail.com';
        $user->password = Hash::make('user123');
        $user->save();

        $admin           = new Admin();
        $admin->name     = 'Simple admin';
        $admin->email    = 'simpleadmin@gmail.com';
        $admin->password = Hash::make('admin123');
        $admin->save();
    }
}
