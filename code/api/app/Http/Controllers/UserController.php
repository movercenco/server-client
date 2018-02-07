<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\PasswordResetNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\User;
use Auth;

class UserController extends Controller
{
    public function getAllAttributes()
    {
        return response()->json(User::getAllAttributes());
    }

    public function getFillableAttributes()
    {
        return response()->json(User::getFillableAttributes());
    }

    public function me()
    {
        return response()->json(User::find(Auth::id()));
    }

    public function getOne($id)
    {
        return response()->json(User::findOrFail($id));
    }

    public function updateOne($id)
    {
        $user = User::findOrFail($id);

        if($user->id != Auth::id()) {
            abort(403);
        }

        $user->update(request()->intersectKeys(User::getFillableAttributes()));

        return response()->json($user);
    }

    public function updateRole($id)
    {
        $roleId = request('role_type');

        $authUser = Auth::user();

        if(! in_array($authUser->role_type, [4, 2])) {
            abort(403);
        }

        $user = User::find($id);

        if($authUser->role_type == 4) {
            if(! in_array($roleId, [1, 2, 3, 5, 6, 7])) {
                abort(422);
            }

        }

        if($authUser->role_type == 2) {
            if(! in_array($roleId, [1, 6, 7])) {
                abort(422);
            }

            if(in_array($user->role_type, [2, 3, 4, 5])){
                abort(403);
            }
        }

        $user->role_type = $roleId;
        $user->save();

        return response()->json($user);
    }

    public function sendResetLinkEmail()
    {
        $user = User::whereEmail(request('email'))->first();
        if (!$user) {
            abort(401);
        }

        $token = str_random(32);
        $pwReset = DB::table('password_resets')->where('email', request('email'))->first();
        if ($pwReset == null) {
            DB::table('password_resets')->insert([
                'email' => request('email'),
                'token' => $token,
                'created_at' => Carbon::now()
            ]);
        } else {
            DB::table('password_resets')
                ->where('email', request('email'))
                ->update(['token' => $token, 'created_at' => Carbon::now()]);
        }

        $user->notify(new PasswordResetNotification($token));

        return response('', 204);
    }

    public function checkToken()
    {
        $token = request('token');
        $result = DB::table('password_resets')->where('token', $token)->first();

        if (!$result) {
            abort(404);
        }

        if ($result->created_at < Carbon::now()->subHours(24)) {
            abort(401);
        }

        return response('', 204);
    }

    public function resetPassword()
    {
        $result = DB::table('password_resets')->where('token', request('token'))->first();

        if (!$result) {
            abort(404);
        }

        if ($result->created_at < Carbon::now()->subHours(24)) {
            abort(401);
        }
        $user = User::whereEmail($result->email)->first();
        if (!$user) {
            abort(404);
        }

        $user->password = request('password');
        $user->save();

        DB::table('password_resets')->where('token', request('token'))->delete();
        return response('', 204);
    }

    public function verifyEmail()
    {
        $email = decrypt(request('token'));

        $user = User::where('email', $email)->first();

        $user->verified_at = Carbon::now();

        $user->save();

        return redirect()->to('https://mundolingo.org');
    }
}
