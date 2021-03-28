<?php

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
        DB::table('users')->insert([
            'id'    =>  '1',
            'name' =>  '123456789',
            'email' =>  'test@email.com',
            'phone'   => '12345678912',
            'password' =>  Hash::make('123456789'),
            'address' =>  'alex',
        ]);

    }
}
