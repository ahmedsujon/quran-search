<?php

namespace App\Http\Livewire\Admin\Layouts\Inc;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;

class Navbar extends Component
{
    public function optimizeSite()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        $this->dispatchBrowserEvent('success', ['message'=>'Website optimized successfully']);
    }

    public function render()
    {
        return view('livewire.admin.layouts.inc.navbar');
    }
}
