<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = [
        'user_id',
        'name_on_card',
        'card_type',
        'card_category',
        'phone_no',
        'balance',
        'email',
        'card_no',
        'cvc',
        'from_date',
        'exp_date',
        'type',
        'card_status',
        'last4',
        'pin',
        'balance',
        'is_default',
        'updated_at',
        'created_at',
        'reject_reason'
    ];
}
