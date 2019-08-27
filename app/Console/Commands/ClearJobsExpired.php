<?php

namespace App\Console\Commands;

use App\JobOffer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ClearJobsExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $current = Carbon::now();
        $allJobs = JobOffer::all();
        foreach ($allJobs as $oneJob) {

            Carbon::parse($oneJob->job_date)->format('Y-m-d');
            if ($oneJob->job_date < $current) {
                JobOffer::find($oneJob->id)->delete();
            }
        }

    }
}
