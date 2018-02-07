<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Flag;

class FlagController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(Flag::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Flag::getFillableAttributes());
    }

    public function getAll()
    {
        return response()->json(Flag::all());
    }
}
