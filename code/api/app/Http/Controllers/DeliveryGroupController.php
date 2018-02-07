<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DeliveryGroup;
use Auth;

class DeliveryGroupController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(DeliveryGroup::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(DeliveryGroup::getFillableAttributes());
    }

    public function create()
    {
        $user = Auth::user();

        if($user->role_type != 3) {
            abort(403);
        }

        $deliveryGroup = $user->deliveryGroups()->create(request()->intersectKeys(DeliveryGroup::getFillableAttributes()));

        return response()->json($deliveryGroup);
    }

    public function getAll()
    {
        $user = Auth::user();

//        if($user->role_type == 3) {
//            return response()->json($user->deliveryGroups()->get());
//        }

        if(in_array($user->role_type, [2, 3, 4])) {
            return response()->json(DeliveryGroup::with('user')->get());
        }

        abort(403);
    }

    public function update($id)
    {
        $deliveryGroup = DeliveryGroup::findOrFail($id);

        if($deliveryGroup->user_id != Auth::id() && Auth::user()->role_type != 4) {
            abort(403);
        }

        $deliveryGroup->update(request()->intersectKeys(DeliveryGroup::getFillableAttributes()));

        return response()->json($deliveryGroup);
    }
}
