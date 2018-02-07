<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'mobile',
        'address',
        'avatar',
        'purpose_role_type_1',
        'purpose_role_type_2',
        'supplier_currency',
    ];

    protected $with = [
        'cities',
        'flags'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function getFillableAttributes()
    {
        return (new static)->getFillable();
    }

    public static function getAllAttributes()
    {
        return \Schema::getColumnListing((new static)->getTable());
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function cities()
    {
        return $this->belongsToMany(City::class);
    }

    public function flags()
    {
        return $this->belongsToMany(Flag::class);
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function deliveryGroups()
    {
        return $this->hasMany(DeliveryGroup::class);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
