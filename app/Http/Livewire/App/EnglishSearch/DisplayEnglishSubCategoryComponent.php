<?php

namespace App\Http\Livewire\App\EnglishSearch;

use App\Models\AyatWord;
use Livewire\Component;

class DisplayEnglishSubCategoryComponent extends Component
{
    public $sortingValue = 20, $searchTerm;
    public $displayCompleteQuraCategory;

    public function render()
    {
        $display_complete_quran_category = AyatWord::where('english_word_subject_category', 'like', '%'.$this->displayCompleteQuraCategory.'%')
        ->paginate($this->sortingValue);

        return view('livewire.app.english-search.display-english-sub-category-component',['display_complete_quran_category'=>$display_complete_quran_category])->layout('livewire.layouts.base');
    }
}
