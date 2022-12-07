<?php

namespace App\Http\Livewire\App\DropdownSearch;

use App\Models\AyatWord;
use App\Models\SubjectDropdown;
use Livewire\Component;
use Livewire\WithPagination;

class SubjectCategoryComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $dropdownsearch;

    public function render()
    {
        $search_dropdowns = AyatWord::where('english_word_subject_category', 'like', '%' . $this->dropdownsearch . '%')->paginate($this->sortingValue);
        
        $dropdown_values = SubjectDropdown::get();
        return view('livewire.app.dropdown-search.subject-category-component', ['search_dropdowns'=>$search_dropdowns, 'dropdown_values'=> $dropdown_values])->layout('livewire.layouts.base');
    }
}
