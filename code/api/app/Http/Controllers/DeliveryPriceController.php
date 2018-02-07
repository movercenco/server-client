<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryPrice;
use App\DeliveryGroup;
use Auth;

class DeliveryPriceController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(DeliveryPrice::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(DeliveryPrice::getFillableAttributes());
    }

    public function create($id)
    {
        $deliveryGroup = DeliveryGroup::findOrFail($id);

        if($deliveryGroup->user_id != Auth::id() && Auth::user()->role_type != 4) {
            abort(403);
        }

        $deliveryPrice = $deliveryGroup->deliveryPrices()->create(request()->intersectKeys(DeliveryPrice::getFillableAttributes()));

        return response()->json($deliveryPrice);
    }

    public function update($id)
    {
        $deliveryPrice = DeliveryPrice::findOrFail($id);

        if($deliveryPrice->deliveryGroup->user_id != Auth::id() && Auth::user()->role_type != 4) {
            abort(403);
        }

        $deliveryPrice->update(request()->intersectKeys(DeliveryPrice::getFillableAttributes()));

        return response()->json($deliveryPrice);
    }

    public function delete($id)
    {
        $deliveryPrice = DeliveryPrice::findOrFail($id);

        if($deliveryPrice->deliveryGroup->user_id != Auth::id() && Auth::user()->role_type != 4) {
            abort(403);
        }

        $deliveryPrice->delete();

        return response('', 204);
    }
}
