<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'nikname' => 'User',
            'email' => 'User@mail.com',
            'password' => Hash::make('password'),
            'path' => 'q6sMdwHR5o52QYZu3e28C6CeBFukpnMl8Hy2hia3.png',
            'status' => 'user'
        ]);
        DB::table('users')->insert([
            'nikname' => 'Admin',
            'email' => 'Admin@mail.com',
            'password' => Hash::make('admin123'),
            'path' => 'MR82ixkguGF6haVR5mX41LbpJWxHhQGFAF9xscIO.png',
            'status' => 'admin'
        ]);
    }
}
