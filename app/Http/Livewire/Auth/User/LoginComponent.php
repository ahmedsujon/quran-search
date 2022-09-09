<?php

namespace App\Http\Livewire\Auth\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginComponent extends Component
{
    public $email, $password;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function adminLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $getUser = User::where('email', $this->email)->first();

        if ($getUser) {
            if (Hash::check($this->password, $getUser->password)) {
                Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

                session()->flash('success', 'Login Successful');
                return redirect()->route('user.dashboard');
            } else {
                session()->flash('error', 'Incorrect email or password');
            }
        } else {
            session()->flash('error', 'Incorrect email or password');
        }
    }

    public function render()
    {
        return view('livewire.auth.user.login-component')->layout('livewire.auth.user.layout');
    }
}
