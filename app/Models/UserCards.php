<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\ActiveEntry;
use App\Models\AccessLog;

class UserCards extends Model
{
    protected $fillable = [
        'uid',
        'nama', // add other columns too
    ];

    public function activeEntry() {
        return $this->hasOne(ActiveEntry::class, 'user_card_id');
    }

    public function accessLogs()
    {
        return $this->hasMany(AccessLog::class, 'user_card_id');
    }
}
