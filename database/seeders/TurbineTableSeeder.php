<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TurbineTableSeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Turbine::factory(12)->create();
    }
}
