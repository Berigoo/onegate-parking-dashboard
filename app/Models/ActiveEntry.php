<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\UserCards;

class ActiveEntry extends Model
{
    use BelongsTo;

    public function userCard()
    {
        return $this->belongsTo(UserCards::class);
    }
}
