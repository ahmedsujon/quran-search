<?php

namespace App\Http\Livewire\App\DropdownSearch;

use App\Models\ArabicDropdown;
use App\Models\AyatWord;
use Livewire\Component;
use Livewire\WithPagination;

class ArabicDropdownComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $dropdownsearch;

    public function render()
    {
        $search_dropdowns = AyatWord::orderBy('normalized_arabic_word', 'ASC')->orderBy('english_word_sub_subject_category', 'ASC')->where('normalized_arabic_word', 'like', '%' . $this->dropdownsearch . '%')->paginate($this->sortingValue);
        
        $dropdown_values = ArabicDropdown::get();
        return view('livewire.app.dropdown-search.arabic-dropdown-component', ['search_dropdowns'=>$search_dropdowns, 'dropdown_values'=> $dropdown_values])->layout('livewire.layouts.base');
    }
}
