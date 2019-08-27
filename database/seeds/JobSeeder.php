<?php

use Illuminate\Database\Seeder;
use \App\JobOffer;
class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $company_id = 1;
        $job_title = ['Manager','Sale','HR','Web-Developer','Tualete-Mxexav'];

        foreach ($job_title as $title){

            $job = new JobOffer();
            $job->company_id = $company_id;
            $job->company_name = 'Google';
            $job->job_title = $title;
            $job->job_date = '11-dec-2019';
            $job->type = 'Full-time';
            $job->experience = 1;
            $job->salary = 2000;
            $job->currency = 'dollar';
            $job->keyword = 'keyword';
            $job->description = 'mokled dzalian rtulia samushaoa';
            $job->save();

            $company_id++;
        }
    }
}
