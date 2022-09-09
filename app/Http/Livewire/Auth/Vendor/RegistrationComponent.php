<?php

namespace App\Http\Livewire\Auth\Vendor;

use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegistrationComponent extends Component
{
    public $first_name, $last_name, $email, $password, $password_confirmation;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:vendors',
            'password' => 'required|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30|same:password',
        ]);
    }

    public function sellerRegistration()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:vendors',
            'password' => 'required|min:8|max:30',
            'password_confirmation' => 'required|min:8|max:30|same:password',
        ]);

        $vendor = new Vendor();
        $vendor->first_name = $this->first_name;
        $vendor->last_name = $this->last_name;
        $vendor->email = $this->email;
        $vendor->password = Hash::make($this->password);
        if ($vendor->save()) {
            Auth::guard('vendor')->attempt(['email' => $this->email, 'password' => $this->password]);

            session()->flash('success', 'Registration successful');
            return redirect()->route('vendor.dashboard');
        }
    }

    public function render()
    {
        return view('livewire.auth.vendor.registration-component')->layout('livewire.auth.vendor.layout');
    }
}
