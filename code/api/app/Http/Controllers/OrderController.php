<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Auth;

class OrderController extends Controller
{
    public $bitcoinRate = null;

    public function getAllAttributes()
    {
        return response()->json(Order::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Order::getFillableAttributes());
    }

    public function create()
    {
        if(Auth::user()->role_type != 2) {
            abort(403);
        }

        $order = Auth::user()->orders()->create(request()->intersectKeys(Order::getFillableAttributes()));

        return response()->json(Order::find($order->id));
    }

    public function getAll()
    {
        $user = Auth::user();

        if(! in_array($user->role_type, [2, 3, 4])) {
            abort(403);
        }

        if($user->role_type == 2){
            return response()->json(Order::where('user_id', $user->id)->where('status', '>=', '2')->orderBy('created_at', 'desc')->get());
        }

        if($user->role_type == 3){
            return response()->json(Order::where('supplier_id', $user->id)->where('status', '>=', '2')->orderBy('created_at', 'desc')->get());
        }

        if($user->role_type == 4){
            return response()->json(Order::where('status', '>=', '2')->get());
        }

        abort(500);
    }

    public function getOne($id)
    {
        $order = Order::findOrFail($id);

        if($order->user_id != Auth::id() && !in_array(Auth::user()->role_type, [3, 4])) {
            abort(403);
        }

        $order->load('flagOrders');

        return response()->json($order);
    }

    public function updateOne($id)
    {
        $order = Order::findOrFail($id);

        if($order->user_id != Auth::id()) {
            abort(403);
        }

        $order->update(request()->intersectKeys(Order::getFillableAttributes()));

        if(request('finished')) {
            $order->deductInventory();
            $order->requestBitcoinAddress();
        }

        return response()->json($order);
    }

    public function markShipped($id)
    {
        $order = Order::findOrFail($id);

        if($order->status != 3) {
            abort(422);
        }

        if($order->supplier_id != Auth::id()) {
            abort(403);
        }

        $order->status = 4;

        $order->save();

        return response()->json($order);
    }

    public function markReceived($id)
    {
        $order = Order::findOrFail($id);

        if($order->status != 4) {
            abort(422);
        }

        if($order->user_id != Auth::id()) {
            abort(403);
        }

        $order->status = 5;

        $order->save();

        return response()->json($order);
    }

    public function processCallback(Request $request)
    {
        $transaction_hash = $request->transaction_hash;
        $amount = $request->value;
        $address = $request->address;
        $confirmations = $request->confirmations;
        $secret = $request->secret;

        $order = Order::where('bitcoin_address', $address)->first();

        if($order){
            $order->confirmation_times = $confirmations;
            $order->transaction_hash = $transaction_hash;
            $order->save();

            if($confirmations >= 3){
                if($order->status == 2) {
                    if($amount >= $this->getSatoshiPrice($order->getTotalPrice() - 5)) {
                        if($amount <= $this->getSatoshiPrice($order->getTotalPrice() + 5)) {
                            $order->satoshi_amount = $amount;
                            $order->status = 3;
                            $order->save();

                            return response('*ok*');
                        }
                    }

                    \Log::info('unmatched bitcoin transaction');
                    \Log::info($request->all());
                    return response('*ok*');
                }

                \Log::info('wrong order status for bitcoin transaction');
                return response('*ok*');

            }

            return response('*MATCH*');
        } else {
            \Log::error('not found order for bitcoin transaction');
            \Log::error($request->all());
            return response('*ok*');
        }
    }

    protected function getSatoshiPrice($amount)
    {
        if($this->bitcoinRate) {
            return $amount * 100000000 / $this->bitcoinRate;
        }

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://blockchain.info/ticker');
        $data = json_decode($res->getBody(), true);
        $rate = $data['USD']['buy'];

        $this->bitcoinRate = $rate;

        return $amount * 100000000 / $rate;
    }
}
