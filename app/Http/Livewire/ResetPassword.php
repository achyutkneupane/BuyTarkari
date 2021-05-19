<?php

namespace App\Http\Livewire;

use App\Events\ResetPasswordRequested;
use App\Models\User;
use Livewire\Component;

class ResetPassword extends Component
{
    public $email,$password;
    public function validation()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'exists' => "This :attribute doesnt exist in our system"
        ],[
            'email' => '<b>Email Address</b>',
        ]);
    }
    public function resetPassword()
    {
        $this->validation();
        $user = User::where('email',$this->email)->first();
        event(new ResetPasswordRequested($user));
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.page.reset-password');
    }
}
