<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'id'        => '1',
            'name'      => 'super admin',
            'email'     => 'admin@admin.com',
            'password'  => Hash::make('123456789'),
            'phone'     => '01234567890'
        ]);

        Role::create(['guard_name' => 'admin', 'name' => 'superAdmin']);
        Role::create(['guard_name' => 'admin', 'name' => 'admin']);

        $user = Admin::find(1);
        $user->assignRole('superAdmin');

    }
}
