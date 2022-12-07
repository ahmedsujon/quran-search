<?php

namespace App\Http\Livewire\App\EnglishSearch;

use App\Models\AyatWord;
use Livewire\Component;

class DisplayEnglishWordComponent extends Component
{
    public $sortingValue = 20, $searchTerm;
    public $displayCompleteQuraWord;


    public function render()
    {
        $display_complete_quran_word = AyatWord::orderBy('surah_number')->where('english_word_subject_category', 'like', '%'.$this->displayCompleteQuraWord.'%')
        ->paginate($this->sortingValue);

        return view('livewire.app.english-search.display-english-word-component', ['display_complete_quran_word'=>$display_complete_quran_word])->layout('livewire.layouts.base');
    }
}
