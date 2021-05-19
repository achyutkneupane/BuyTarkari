<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ResetPasswordToken extends Component
{
    public $email,$password,$password_confirmation,$token;
    public function mount($token)
    {
        $this->token = $token;
        $this->email = DB::table('password_resets')->where('token',$this->token)->first()->email;
    }
    public function validation()
    {
        $this->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ],[
            'same' => '<b>Passwords</b> do not match.'
        ],[
            'password' => '<b>Password</b>',
            'password_confirmation' => '<b>Confirmation Password</b>',
        ]);
    }
    public function resetPassword()
    {
        $this->validation();
        User::where('email',$this->email)->update([
            'password' => Hash::make($this->password)
        ]);
        DB::table('password_resets')->where('email',$this->email)->delete();
        redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.page.reset-password-token');
    }
}
