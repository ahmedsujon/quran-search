<?php

namespace App\Http\Livewire\Admin\WebsiteSetup;

use App\Models\WebsiteSetup;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class FooterSectionComponent extends Component
{
    public $footer_logo, $uploadedfooter_logo;

    use WithFileUploads;
    
    public function mount()
    {
        $setting = WebsiteSetup::where('id', 1)->first();
        if($setting != ''){
            $this->uploadedfooter_logo = $setting->footer_logo;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'footer_logo'=>'required_if:uploadedfooter_logo,null',
        ]);
    }

    public function updateHeader()
    {
        $this->validate([
            'footer_logo'=>'required_if:uploadedfooter_logo,null',
        ]);

        $setting = WebsiteSetup::where('id', 1)->first();

        if($this->footer_logo != ''){
            $imageName = Carbon::now()->timestamp. '_logo.' . $this->footer_logo->extension();
            $this->footer_logo->storeAs('logo',$imageName);
            $setting->footer_logo = $imageName;
        }

        $setting->save();
        $this->dispatchBrowserEvent('success', ['message'=>'Setting updated successfully']);
    }

    public function render()
    {
        return view('livewire.admin.website-setup.footer-section-component')->layout('livewire.admin.layouts.base');
    }
}
