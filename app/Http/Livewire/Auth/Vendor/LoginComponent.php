<?php

namespace App\Http\Livewire\Auth\Vendor;

use App\Models\Vendor;
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

        $getVendor = Vendor::where('email', $this->email)->first();

        if ($getVendor) {
            if (Hash::check($this->password, $getVendor->password)) {
                Auth::guard('vendor')->attempt(['email' => $this->email, 'password' => $this->password]);

                session()->flash('success', 'Login Successful');
                return redirect()->route('vendor.dashboard');
            } else {
                session()->flash('error', 'Incorrect email or password');
            }
        } else {
            session()->flash('error', 'Incorrect email or password');
        }
    }

    public function render()
    {
        return view('livewire.auth.vendor.login-component')->layout('livewire.auth.vendor.layout');
    }
}
