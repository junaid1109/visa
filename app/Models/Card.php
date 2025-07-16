<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'user_id',
        'name_on_card',
        'balance',
        'email',
        'card_no',
        'cvc',
        'from_date',
        'exp_date',
        'type',
        'card_status',
        'last4',
        'balance',
        'is_default',
        'updated_at',
        'created_at',
    ];
}
