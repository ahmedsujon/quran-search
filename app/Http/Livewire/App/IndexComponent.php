<?php

namespace App\Http\Livewire\App;

use Livewire\Component;

class IndexComponent extends Component
{
    public function render()
    {
        return view('livewire.app.index-component')->layout('livewire.layouts.base');
    }
}
