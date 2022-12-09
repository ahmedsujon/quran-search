<?php

namespace App\Http\Livewire\Admin;

use App\Models\ArabicDropdown;
use App\Models\AyatWord;
use App\Models\Dropdown;
use App\Models\Hadith;
use App\Models\SubjectDropdown;
use App\Models\SuraAyat;
use Livewire\Component;

class DashboardComponent extends Component
{
    public function render()
    {
        $ayatwords = AyatWord::get()->count();
        $sura_ayats = SuraAyat::get()->count();
        $hadiths = Hadith::get()->count();
        $subject_dropdown = SubjectDropdown::get()->count();
        $dropdowns = Dropdown::get()->count();
        $arabic_dropdown = ArabicDropdown::get()->count();

        return view('livewire.admin.dashboard-component', [
            'ayatwords'=>$ayatwords,
            'sura_ayats' => $sura_ayats,
            'hadiths' => $hadiths,
            'dropdowns' => $dropdowns,
            'subject_dropdown'=>$subject_dropdown,
            'arabic_dropdown' => $arabic_dropdown,
            ])->layout('livewire.admin.layouts.base');
    }
}
