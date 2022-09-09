<?php

namespace App\Http\Livewire\Admin\Profile;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileComponent extends Component
{
    public $first_name, $last_name, $email, $phone, $new_password, $confirm_password, $avatar, $uploadedAvatar;

    use WithFileUploads;

    public function mount()
    {
        $setting = Admin::where('id', admin()->id)->first();
        if($setting != ''){
            $this->first_name = $setting->first_name;
            $this->last_name = $setting->last_name;
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->uploadedAvatar = $setting->avatar;
        }
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'avatar'=>'required_if:uploadedAvatar,null',
        ]);
    }

    public function updateProfile()
    {
        if($this->new_password != ''){
            $this->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'avatar'=>'required_if:uploadedAvatar,null',
                'new_password'=>'min:8|same:confirm_password'
            ]);
        }
        else{
            $this->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required',
                'phone'=>'required',
                'avatar'=>'required_if:uploadedAvatar,null',
                'new_password'=>'same:confirm_password'
            ]);
        }

        $admin = Admin::where('id', admin()->id)->first();
        $admin->first_name = $this->first_name;
        $admin->last_name = $this->last_name;
        $admin->phone = $this->phone;
        if($this->avatar != ''){
            $imageName = Carbon::now()->timestamp. '.' . $this->avatar->extension();
            $this->avatar->storeAs('profile',$imageName);
            $admin->avatar = $imageName;
        }

        if($this->new_password != ''){
            $admin->password = Hash::make($this->new_password);
        }

        $admin->save();
        $this->dispatchBrowserEvent('success', ['message'=>'Profile updated successfully']);
    }

    public function render()
    {
        return view('livewire.admin.profile.profile-component')->layout('livewire.admin.layouts.base');
    }
}
