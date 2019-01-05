<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    protected $table = 'joblist';
    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function job()
    {
        return $this->belongsTo('App\Job');
    }
}
