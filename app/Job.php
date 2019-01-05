<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    public $primaryKey = 'id';

    public function savedJobs()
    {
        return $this->hasOne('App\SavedJobs');
    }
}