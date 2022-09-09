<?php

namespace App\Http\Livewire\Vendor;

use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        return view('livewire.vendor.dashboard-component')->layout('livewire.vendor.layouts.base');
    }
}
