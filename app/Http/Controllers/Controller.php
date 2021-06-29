<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function logout() {
        Auth::logout();
        session()->forget('cart_id');
        return redirect('/');
    }
    public function verifyEmail($token)
    {
        $user = User::where('verify_token',$token);
        if($user->exists())
        {
            $user->update([
                'email_verified_at' => now()
            ]);
        }
        return redirect()->route('login');
    }
}
