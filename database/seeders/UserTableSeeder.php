<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name ='Usama Munir';
        $user->email='hello@usamamuneer.me';
        $user->password = bcrypt('secret');
        $user->save();

    }
}
