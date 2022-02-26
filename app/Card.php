<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    //use HasFactory;

    protected $table = 'cards';
    public $timestamps = true;

    protected $casts = [
        'balance' => 'double'
    ];

    protected $fillable = [
        'card_number',
        'pin',
        'activation_date',
        'expiration_date',
        'balance'
    ];
}
