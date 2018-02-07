<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CityDeliveryGroup;
use App\DeliveryGroup;
use Auth;

class CityDeliveryGroupController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(CityDeliveryGroup::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(CityDeliveryGroup::getFillableAttributes());
    }

    public function sync()
    {
        $deliveryGroup = DeliveryGroup::findOrFail(request('delivery_group_id'));
        $cityIds = request('city_ids');

        if(Auth::id() != $deliveryGroup->user_id && Auth::user()->role_type != 4) {
            abort(403);
        }

        $deliveryGroup->cities()->sync($cityIds);

        return response('', 204);
    }
}
