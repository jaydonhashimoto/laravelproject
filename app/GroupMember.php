<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    protected $table = 'groupmembers';
    public $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}