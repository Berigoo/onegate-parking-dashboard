<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\ActiveEntry;

class UserCards extends Model
{
    use HasOne;
    
    protected $fillable = [
        'uid',
        'nama', // add other columns too
    ];

    public function isEntered() {
        return $this->hasOne(ActiveEntry::class);
    }
}
