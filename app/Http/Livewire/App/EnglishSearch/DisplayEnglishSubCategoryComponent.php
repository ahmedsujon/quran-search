<?php

namespace App\Http\Livewire\App\EnglishSearch;

use App\Models\AyatWord;
use Livewire\Component;
use Livewire\WithPagination;

class DisplayEnglishSubCategoryComponent extends Component
{
    use WithPagination;
    
    public $sortingValue = 20, $searchTerm;
    public $displayCompleteQuraCategory;

    public function render()
    {
        $display_complete_quran_category = AyatWord::orderBy('english_word_subject_category', 'ASC')->orderBy('english_word_sub_subject_category', 'ASC')->paginate($this->sortingValue);

        return view('livewire.app.english-search.display-english-sub-category-component',['display_complete_quran_category'=>$display_complete_quran_category])->layout('livewire.layouts.base');
    }
}
