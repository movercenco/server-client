<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Inventory;

class InventoryController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(Inventory::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(Inventory::getFillableAttributes());
    }

    public function update()
    {
        $user = Auth::user();

        if($user->role_type != 3) {
            abort(403);
        }

        $inventories = request('data');

        foreach($inventories as $inventory) {
            Inventory::updateOrCreate([
                'user_id' => $user->id,
                'flag_id' => $inventory['flag_id'],
            ], [
                'amount' => $inventory['amount'],
            ]);
        }

        return response('', 204);
    }

    public function getAll()
    {
        $user = Auth::user();

        if($user->role_type == 3) {
            return response()->json($user->inventories()->get());
        }

        if(in_array($user->role_type, [2, 4])) {
            return response()->json(Inventory::all());
        }

        abort(403);
    }
}
