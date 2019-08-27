<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            'Nikoloz Gvritishvili',
            'Sandrika Pailodze',
            'Nina Kikava',
            'Ochopintre Samchkuashvili',
            'Jondi Baghaturia'

        ];

        foreach ($array as $one){
            $user = new User();
            $user->name = $one;
            $user->email = str_slug($one). '@cz.com';
            $user->password = bcrypt('123123');
            $user->save();
        }
    }
}
