<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'event_id',
        'participant_amount',
        'bar_cost',
        'bar_revenue',
        'currency',
        'receipt',
    ];

    protected $dates = ['deleted_at'];

}