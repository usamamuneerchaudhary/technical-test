<?php


namespace Database\Seeders;

use App\Models\Component;

use App\Models\Turbine;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Testing\WithFaker;

class ComponentTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blade = new Component();
        $blade->name = 'Blade';
        $blade->save();

        $rotor = new Component();
        $rotor->name = 'Rotor';
        $rotor->save();

        $hub = new Component();
        $hub->name = 'Hub';
        $hub->save();

        $generator = new Component();
        $generator->name = 'Generator';
        $generator->save();

        $turbines = Turbine::all();
        foreach ($turbines as $turbine) {
            $turbine->components()->attach([$blade->id, $hub->id, $rotor->id, $generator->id]);
        }
    }
}
