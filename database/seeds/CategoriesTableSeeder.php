<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'          => 'Ágatas',
            'visible'       => '1',
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
        ]);
        DB::table('categories')->insert([
            'name'      => 'Amatistas',
            'visible'   => '1',
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
        ]);
        DB::table('categories')->insert([
            'name'      => 'Quartzo',
            'visible'   => '1',
            'created_at'    => \Carbon\Carbon::now(),
            'updated_at'    => \Carbon\Carbon::now()
        ]);
    }
}
