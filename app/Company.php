<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use Searchable;
    protected $table = 'companies';
    protected $guarded = [];

    public function company_owner()
    {
        return $this->belongsTo(User::class);
    }

    public function job_offers()
    {
        return $this->hasMany(JobOffer::class);
    }
}
