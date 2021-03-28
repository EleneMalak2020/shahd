<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id'        => '1',
            'name_ar'      => 'العروض',
            'name_en'     => 'offers',
            'image'  => '',
        ]);

    }
}
