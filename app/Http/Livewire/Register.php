<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $email,$password,$name,$password_confirmation;
    public function validation()
    {
        $this->validate([
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ],[
            'unique' => "This :attribute is already used",
            'same' => '<b>Passwords</b> do not match.'
        ],[
            'email' => '<b>Email Address</b>',
            'name' => '<b>Name</b>',
            'password' => '<b>Password</b>',
            'password_confirmation' => '<b>Confirmation Password</b>',
        ]);
    }
    public function signup()
    {
        $this->validation();
        $user = User::create([
            'email' => $this->email,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'verify_token' => sha1(sha1(time())),
            'device' => 'web'
        ]);
        event(new Registered($user));
        redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.page.register');
    }
}
