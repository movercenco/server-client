<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public static function getFillableAttributes()
    {
        return (new static)->getFillable();
    }

    public static function getAllAttributes()
    {
        return \Schema::getColumnListing((new static)->getTable());
    }
}
