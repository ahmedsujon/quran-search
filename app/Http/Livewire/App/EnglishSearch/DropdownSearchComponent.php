<?php

namespace App\Http\Livewire\App\EnglishSearch;

use App\Models\AyatWord;
use App\Models\Dropdown;
use Livewire\Component;
use Livewire\WithPagination;

class DropdownSearchComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $dropdownsearch;

    public function render()
    {
        $search_dropdowns = AyatWord::where('english_word_subject_category', 'like', '%' . $this->dropdownsearch . '%')->paginate($this->sortingValue);
        
        $dropdown_values = Dropdown::get();

        return view('livewire.app.english-search.dropdown-search-component', ['search_dropdowns'=>$search_dropdowns, 'dropdown_values'=> $dropdown_values])->layout('livewire.layouts.base');
    }
}
