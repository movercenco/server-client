<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlagOrder;
use Auth;
use App\Order;

class FlagOrderController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(FlagOrder::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(FlagOrder::getFillableAttributes());
    }

    public function update()
    {
        $user = Auth::user();

        if($user->role_type != 2) {
            abort(403);
        }

        $order = Order::findOrFail(request('order_id'));

        if($order->user_id != $user->id) {
            abort(403);
        }

        $flagOrders = request('data');

        foreach($flagOrders as $flagOrder) {
            FlagOrder::updateOrCreate([
                'order_id' => $order->id,
                'flag_id' => $flagOrder['flag_id'],
            ], [
                'amount' => $flagOrder['amount'],
            ]);
        }

        return response('', 204);
    }
}
