<?php

namespace App\Http\Livewire\Admin;

use App\Models\AyatWord;
use App\Models\Dropdown;
use App\Models\Hadith;
use App\Models\SuraAyat;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $ayatwords = AyatWord::get()->count();
        $sura_ayats = SuraAyat::get()->count();
        $hadiths = Hadith::get()->count();
        $dropdowns = Dropdown::get()->count();
        return view('livewire.admin.dashboard-component', [
            'ayatwords'=>$ayatwords,
            'sura_ayats' => $sura_ayats,
            'hadiths' => $hadiths,
            'dropdowns' => $dropdowns,
            ])->layout('livewire.admin.layouts.base');
    }
}
