<?php

namespace App\Http\Controllers;

use App\Events\ResetPasswordRequested;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function authenticate(Request $request) {
        $user = User::where('email',$request->email);
        if($user->exists()) {
            if(Hash::check($request->password, $user->first()->password)) {
                Auth::loginUsingId($user->first()->id);
                return response()->json($user->first());
            }
            else {
                return response()->json(['error'=>"Password is not correct."]);
            }
        }
        else
        {
            return response()->json(['error'=>"This email doesn't exist in our system."]);
        }
    }

    public function signup(Request $request)
    {
        $user = User::where('email',$request->email);
        if(!$user->exists()) {
            $newUser = User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'verify_token' => sha1(sha1(time())),
                'device' => $request->device
            ]);
            event(new Registered($newUser));
            return response()->json($newUser);
        }
        else
        {
            return response()->json(['error' => 'This email doesn\'t exist in our system.']);
        }
    }
    public function resetPassword(Request $request)
    {
        $user = User::where('email',$request->email);
        if($user->exists()) {
            $user = User::where('email',$request->email)->first();
            event(new ResetPasswordRequested($user));
            return response()->json(true);
        }
        else
        {
            return response()->json(['error'=>"This email doesn't exist in our system."]);
        }
    }
}
