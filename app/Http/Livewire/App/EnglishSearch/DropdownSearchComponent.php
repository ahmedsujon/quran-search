<?php

namespace App\Http\Livewire\App\EnglishSearch;

use App\Models\AyatWord;
use Livewire\Component;
use Livewire\WithPagination;

class DropdownSearchComponent extends Component
{
    use WithPagination;
    public $sortingValue = 10, $searchTerm;
    public $dropdownsearch;

    public function render()
    {
        $search_dropdowns = AyatWord::where('english_word_sub_subject_category', 'like', '%' . $this->dropdownsearch . '%')->paginate($this->sortingValue);

        return view('livewire.app.english-search.dropdown-search-component', ['search_dropdowns'=>$search_dropdowns])->layout('livewire.layouts.base');
    }
}
