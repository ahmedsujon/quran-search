<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $get = Admin::where('email', 'admin@example.com')->first();

        if (!$get) {
            $admin = new Admin();
            $admin->first_name = 'Mr';
            $admin->last_name = 'Admin';
            $admin->email = 'admin@example.com';
            $admin->password = Hash::make('12345678');
            $admin->save();
        }
    }
}
