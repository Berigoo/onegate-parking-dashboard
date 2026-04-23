<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCards extends Model
{
    protected $fillable = [
        'uid',
        'nama', // add other columns too
    ];
}
