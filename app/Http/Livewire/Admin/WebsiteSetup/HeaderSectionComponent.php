<?php

namespace App\Http\Livewire\Admin\WebsiteSetup;

use App\Models\WebsiteSetup;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class HeaderSectionComponent extends Component
{
    public $logo, $uploadedLogo, $fav_icon, $uploadedFavIcon;

    use WithFileUploads;
    
    public function mount()
    {
        $setting = WebsiteSetup::where('id', 1)->first();
        if($setting != ''){
            $this->uploadedLogo = $setting->header_logo;
            $this->uploadedFavIcon = $setting->fav_icon;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'logo'=>'required_if:uploadedLogo,null',
            'fav_icon'=>'required_if:uploadedFavIcon,null',
        ]);
    }

    public function updateHeader()
    {
        $this->validate([
            'logo'=>'required_if:uploadedLogo,null',
            'fav_icon'=>'required_if:uploadedFavIcon,null',
        ]);

        $setting = WebsiteSetup::where('id', 1)->first();

        if($this->logo != ''){
            $imageName = Carbon::now()->timestamp. '_logo.' . $this->logo->extension();
            $this->logo->storeAs('logo',$imageName);
            $setting->header_logo = $imageName;
        }

        if($this->fav_icon != ''){
            $favIconName = Carbon::now()->timestamp. '_favicon.' . $this->fav_icon->extension();
            $this->fav_icon->storeAs('logo',$favIconName);
            $setting->fav_icon = $favIconName;
        }

        $setting->save();

        $this->dispatchBrowserEvent('success', ['message'=>'Setting updated successfully']);
    }

    public function render()
    {
        return view('livewire.admin.website-setup.header-section-component')->layout('livewire.admin.layouts.base');
    }
}
