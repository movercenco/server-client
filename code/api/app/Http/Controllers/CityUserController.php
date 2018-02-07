<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CityUser;
use Auth;
use App\User;
use App\City;

class CityUserController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(CityUser::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(CityUser::getFillableAttributes());
    }

    public function sync()
    {
        $userId = request('user_id');
        $cityIds = request('city_ids');

        if(Auth::id() != $userId) {
            abort(403);
        }

        $user = User::find($userId);

        if($user->role_type != 1) {
            abort(403);
        }

        if(count($cityIds) > 3){
            abort(422);
        }

        $user->cities()->sync($cityIds);

        return response('', 204);
    }

    public function getUserForOneCity($id)
    {
        $users = City::findOrFail($id)->users;

        return response()->json($users);
    }
}
