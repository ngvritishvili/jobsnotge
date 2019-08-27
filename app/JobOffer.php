<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class JobOffer extends Model
{
    use Searchable;
    protected $table = 'job_offers';
    protected $guarded = [];
    protected $dateFormat = 'Y-m-d H:i:s';

    protected $dates = [
        'created_at',
        'updated_at',
        'job_date',
    ];


    public function job_owner(){
        return $this->belongsTo(Company::class);
    }



}
