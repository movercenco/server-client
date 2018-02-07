<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends BaseModel
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'image',
        'day_of_week',
        'place',
        'address',
        'time',
        'contact_name',
        'contact_phone',
        'city_id',
        'meetup_link',
        'facebook_link',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
