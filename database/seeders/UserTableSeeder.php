<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $get = User::where('email', 'user@example.com')->first();

        if (!$get) {
            $user = new User();
            $user->first_name = 'Mr';
            $user->last_name = 'User';
            $user->email = 'user@example.com';
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
