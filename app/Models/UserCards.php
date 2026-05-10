<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\ActiveEntry;

class UserCards extends Model
{
    protected $fillable = [
        'uid',
        'nama', // add other columns too
    ];

    public function activeEntry() {
        return $this->hasOne(ActiveEntry::class, 'user_card_id');
    }
}
