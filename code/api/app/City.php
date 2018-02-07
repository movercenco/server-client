<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class City extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'region',
        'timezone',
        'currency',
        'balance'
    ];

    protected $visible = [
        'id',
        'name',
        'region',
        'timezone',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reports()
    {
        return $this->hasManyThrough(Report::class, Event::class);
    }
}
