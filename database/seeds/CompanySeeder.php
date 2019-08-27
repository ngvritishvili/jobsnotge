<?php

use Illuminate\Database\Seeder;
use \App\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_id = 1;
        $names = ['Google', 'Facebook', 'Tweeter', 'SpaceX', 'Rustavi2'];

        foreach ($names as $name) {

            $newComp = new Company();
            $newComp->user_id = $user_id;
            $newComp->name = $name;
            $newComp->author_name = 'Nika';
            $newComp->position_in_company = 'HR';
            $newComp->company_email = $name . '@' . $name . '.com';
            $newComp->company_phone = '555555555';
            $newComp->save();
            $user_id++;
        }


    }
}
