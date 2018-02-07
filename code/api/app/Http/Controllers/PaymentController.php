<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Payment;
use App\Event;

class PaymentController extends Controller
{
    public $bitcoinRate = null;

    public function getAllAttributes()
    {
        return response()->json(Payment::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Payment::getFillableAttributes());
    }

    public function create()
    {
        if(Auth::user()->role_type != 2) {
            abort(403);
        }

        $payment = Auth::user()->payments()->create(request()->intersectKeys(Payment::getFillableAttributes()));
        $payment = Payment::find($payment->id);
        $payment->requestBitcoinAddress();

        return response()->json($payment);
    }

    public function getAll()
    {
        $user = Auth::user();

        if(! in_array($user->role_type, [2, 4])) {
            abort(403);
        }

        if($user->role_type == 4){
            return response()->json(Payment::with('user')->get());
        }

        if($user->role_type == 2){
            return response()->json($user->payments);
        }

        abort(500);
    }

    public function processCallback(Request $request)
    {
        $transaction_hash = $request->transaction_hash;
        $amount = $request->value;
        $address = $request->address;
        $confirmations = $request->confirmations;
        $secret = $request->secret;

        $payment = Payment::where('bitcoin_address', $address)->first();

        if($payment){
            $payment->confirmation_times = $confirmations;
            $payment->transaction_hash = $transaction_hash;
            $payment->satoshi_amount = $amount;
            if($payment->status == 1) {
                $payment->status = 2;
            }
            $payment->save();

            if($confirmations >= 3){
                if($payment->status == 2) {
                    if($payment->satoshi_amount >= $this->getSatoshiPrice($payment->total_amount, $payment->currency) * 0.98) {
                        $payment->status = 3;
                        $payment->save();
                        $city = $payment->city;
                        $city->balance -= $payment->total_amount;
                        $city->save();
                        return response('*ok*');

                    }

                    \Log::info('unmatched bitcoin transaction(payment)');
                    \Log::info($request->all());
                    return response('*ok*');
                }

                \Log::info('wrong payment status for bitcoin transaction');
                return response('*ok*');

            }

            return response('*MATCH*');
        } else {
            \Log::error('not found payment for bitcoin transaction');
            \Log::error($request->all());
            return response('*ok*');
        }
    }

    protected function getSatoshiPrice($amount, $currency)
    {
        if($this->bitcoinRate) {
            return $amount * 100000000 / $this->bitcoinRate;
        }

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'https://blockchain.info/ticker');
        $data = json_decode($res->getBody(), true);
        $rate = $data[$currency]['buy'];

        $this->bitcoinRate = $rate;

        return $amount * 100000000 / $rate;
    }
}
