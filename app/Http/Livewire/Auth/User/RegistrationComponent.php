<?php

namespace App\Http\Livewire\Auth\User;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationComponent extends Component
{
    public $first_name, $last_name, $email, $password, $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:sellers',
            'password' => 'required|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30|same:password',
        ]);
    }

    public function userRegistration()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:sellers',
            'password' => 'required|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30|same:password',
        ]);

        $user = new User();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        if ($user->save()) {
            Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password]);

            session()->flash('success', 'Registration successful');
            return redirect()->route('user.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.user.registration-component')->layout('livewire.auth.user.layout');
    }
}
