<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $user = User::where('email', 'admin@example.com')->first();
//        if (!$user) {
//            $user = new User;
//            $user->name = "Admin";
//            $user->role = 'ADMIN';
//            $user->email = 'admin@example.com';
//            $user->password = Hash::make('adminpass');
//            $user->save();
//        }

        $user = User::where('email', 'staff@example.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "Staff";
            $user->role = 'STAFF';
            $user->email = 'staff@example.com';
            $user->password = Hash::make('staffpass');
            $user->save();
        }

        $user = User::where('email', 'eazy@example.com')->first();
        if (!$user) {
            $user = new User;
            $user->name = "eazywebtech";
            $user->role = 'USER';
            $user->email = 'eazy@example.com';
            $user->password = Hash::make('eazypass');
            $user->save();
        }

        User::factory(5)->create();
    }
}
