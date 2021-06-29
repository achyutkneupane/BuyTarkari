<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email,$password;
    public function validation()
    {
        $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ],[
            'exists' => "This :attribute doesnt exist in our system"
        ],[
            'email' => '<b>Email Address</b>',
            'password' => '<b>Password</b>'
        ]);
    }
    public function authenticate()
    {
        $this->validation();
        $user = User::where('email',$this->email)->first();
        if(Hash::check($this->password, $user->password)) {
            Auth::loginUsingId($user->id);
            if(!session()->has('cart_id'))
            {
                if(auth()->id() && auth()->user()->orders()->where('status','cart')->count())
                {
                    session([
                        'cart_id' => auth()->user()->orders()->where('status','cart')->get()->last()->session_id
                    ]);
                }
            }
            else
            {
                if(auth()->id())
                {
                    if(auth()->user()->orders()->where('status','cart')->count()) {
                        if(auth()->user()->orders()->where('status','cart')->get()->last()->products()->count())
                        {
                            $order = Order::where('session_id',session()->get('cart_id'))->get()->last();
                            foreach($order->products as $product)
                            {
                                if(!auth()->user()->orders()->where('status','cart')->get()->last()->products->contains($product))
                                auth()->user()->orders()->where('status','cart')->get()->last()->products()->attach($product->id);
                            }
                            $order->delete();
                        session(['cart_id'=>auth()->user()->orders()->where('status','cart')->get()->last()->session_id]);
                        }
                        else
                        {
                            $order = Order::where('session_id',session()->get('cart_id'))->get()->last();
                            $order->user_id = auth()->id();
                            $order->save();
                        }
                    }
                    else
                    {
                        $order = Order::where('session_id',session()->get('cart_id'))->get()->last();
                        $order->user_id = auth()->id();
                        $order->save();
                    }
                }
            }
            redirect()->route('landing_page');
        }
        else {
            $this->addError('password','You have entered wrong password.');
        }
    }
    public function render()
    {
        return view('livewire.page.login');
    }
}
