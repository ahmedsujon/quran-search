<?php

namespace App\Http\Livewire\App\ArabicSearch;

use App\Models\AyatWord;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayQuraComponent extends Component
{
    use WithPagination;
    public $sortingValue = 20, $searchTerm;
    public $displayQuraArabic;
    public $displayQuraArabicTabTwo;
    public $tabStatus = 'tabOne';

    public function tabchnage($value)
    {
        $this->tabStatus = $value;
    }

    public function render()
    {
        $display_quran_arabic = AyatWord::orderBy('id', 'ASC')->where('arabic_root_word', 'like', '%'.$this->displayQuraArabic.'%')
        ->paginate($this->sortingValue);
        $display_quran_arabic_tab_two = AyatWord::where('arabic_root_word', 'like', '%'.$this->displayQuraArabicTabTwo.'%')
        ->paginate($this->sortingValue);

        return view('livewire.app.arabic-search.display-qura-component', ['display_quran_arabic'=>$display_quran_arabic, 'display_quran_arabic_tab_two'=>$display_quran_arabic_tab_two])->layout('livewire.layouts.base');
    }
}
