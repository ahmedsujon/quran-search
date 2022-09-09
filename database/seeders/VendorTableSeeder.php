<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $get = Vendor::where('email', 'vendor@example.com')->first();

        if (!$get) {
            $vendor = new Vendor();
            $vendor->first_name = 'Mr';
            $vendor->last_name = 'Vendor';
            $vendor->email = 'vendor@example.com';
            $vendor->password = Hash::make('12345678');
            $vendor->save();
        }
    }
}
