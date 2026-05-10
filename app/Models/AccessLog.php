<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessLog extends Model
{
    protected $fillable = [
        'user_card_id',
        'entered_at',
        'exited_at',
    ];
    
    public function userCard()
    {
        return $this->belongsTo(UserCards::class, 'user_card_id');
    }

}
