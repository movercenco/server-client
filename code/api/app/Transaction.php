<?php

namespace App;

class Transaction extends BaseModel
{
    protected $fillable = [
        'time',
        'fiat_amount',
        'satoshi_amount',
        'type',
        'receipt',
    ];

    protected $dates = [
        'time',
    ];
}
