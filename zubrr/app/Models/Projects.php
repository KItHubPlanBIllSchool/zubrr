<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
        'projectname',
        'start',
        'end',
        'desc',
        'user_id',
        'state',
        'kv1',
        'kv2',
        'kv3',
        'kv4',
    
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public $timestamps = false;
}

