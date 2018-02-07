<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlagUser;
use Auth;
use App\User;
use App\Flag;

class FlagUserController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(FlagUser::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(FlagUser::getFillableAttributes());
    }

    public function sync()
    {
        $userId = request('user_id');
        $flagIds = request('flag_ids');

        if(Auth::id() != $userId) {
            abort(403);
        }

        $user = User::find($userId);

        foreach($flagIds as $flagId) {
            if(Flag::findOrFail($flagId)->is_language != true) {
                abort(422);
            }
        }

        if(count($flagIds) > 10){
            abort(422);
        }

        $user->flags()->sync($flagIds);

        return response('', 204);
    }
}
