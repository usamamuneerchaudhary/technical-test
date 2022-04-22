<?php


namespace Database\Seeders;

use App\Models\Farm;
use App\Models\Turbine;
use Illuminate\Database\Seeder;

class FarmTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $turbine = new Farm();
        $turbine->save();

    }
}
