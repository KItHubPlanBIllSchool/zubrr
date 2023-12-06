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
        'isapproved',
        'user_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public $timestamps = false;
}

