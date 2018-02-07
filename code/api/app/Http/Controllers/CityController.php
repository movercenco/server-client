<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Auth;

class CityController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(City::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(City::getFillableAttributes());
    }

    public function getAll()
    {
        return response()->json(City::all()->groupBy('region'));
    }

    public function create()
    {
        if(Auth::user()->role_type != 4) {
            abort(403);
        }

        $city = City::create(request()->intersectKeys(City::getFillableAttributes()));

        return response()->json($city);
    }

    public function delete($id)
    {
        if(Auth::user()->role_type != 4) {
            abort(403);
        }

        City::findOrFail($id)->delete();

        return response('', 204);
    }

    public function getOne($id)
    {
        $city = City::findOrFail($id);

        if(Auth::check()) {
            if(in_array(Auth::user()->role_type, [2, 4])) {
                return response()->json($city->makeVisible(['currency', 'balance']));
            }
        }

        return response()->json($city);
    }

    public function cleanReports($id)
    {
        $city = City::findOrFail($id);

        if(Auth::user()->role_type != 2) {
            abort(403);
        }

        foreach($city->reports as $report) {
            $report->delete();
        }

        return response('', 204);
    }

    public function updateOne($id)
    {
        $city = City::findOrFail($id);

        if(! in_array(Auth::user()->role_type, [2, 4])) {
            abort(403);
        }

        $city->update(request()->intersectKeys(City::getFillableAttributes()));

        return response()->json($city);
    }
}
