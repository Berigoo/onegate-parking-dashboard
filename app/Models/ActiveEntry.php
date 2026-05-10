<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\UserCards;

class ActiveEntry extends Model
{
    public function userCard()
    {
        return $this->belongsTo(UserCards::class, 'user_card_id');
    }
}
