<?php

namespace App;

class DeliveryGroup extends BaseModel
{
    protected $fillable = [
        'name',
    ];

    protected $with = [
        'cities',
        'deliveryPrices',
    ];

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function deliveryPrices()
    {
        return $this->hasMany(DeliveryPrice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
