<?php

namespace App;

class DeliveryPrice extends BaseModel
{
    protected $fillable = [
        'min',
        'max',
        'price',
    ];

    public function deliveryGroup()
    {
        return $this->belongsTo(DeliveryGroup::class);
    }
}
