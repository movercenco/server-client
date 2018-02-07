<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Auth;
use App\User;

class TransactionController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(Transaction::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Transaction::getFillableAttributes());
    }

    public function getAll()
    {
        $user = Auth::user();

        if(! in_array($user->role_type, [3, 4])) {
            abort(403);
        }

        if($user->role_type == 3){
            $transactions = Auth::user()->transactions;
        }

        if($user->role_type == 4){
            $transactions = User::with('transactions')->where('role_type', 3)->get();
        }

        return response()->json($transactions);
    }

    public function create()
    {
        $transaction = Auth::user()->transactions()->create(request()->intersectKeys(Transaction::getFillableAttributes()));

        return response()->json($transaction);
    }
}
