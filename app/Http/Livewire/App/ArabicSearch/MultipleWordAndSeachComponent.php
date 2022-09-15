<?php

namespace App\Http\Livewire\App\ArabicSearch;

use App\Models\AyatWord;
use App\Models\SuraAyat;
use Livewire\Component;
use Livewire\WithPagination;

class MultipleWordAndSeachComponent extends Component
{
    use WithPagination;
    public $sortingValue = 20, $searchTerm;
    public $multipleOrWordSearchOne, $multipleOrWordSearchtwo, $multipleOrWordSearchthree;
    public $multipleOrWordSearchTabTwoOne, $multipleOrWordSearchTabTwoTwo, $multipleOrWordSearchTabTwoThree;
    public $multipleOrWordSearchTabThreeOne, $multipleOrWordSearchTabThreeTwo, $multipleOrWordSearchTabThreeThree;
    public $tabStatus = 'tabOne';
    public $multipleWordSearchThree;

    public function tabchnage($value)
    {
        $this->tabStatus = $value;
    }

    public function render()
    {

        $multiple_or_words_search = SuraAyat::where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchOne . '%')->where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchtwo . '%')->where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchthree . '%')->orderBy('surah_number', 'ASC')->paginate($this->sortingValue);


        $multiple_or_words_search_tab_two = SuraAyat::where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchTabTwoOne . '%')->where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchTabTwoTwo . '%')->where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchTabTwoThree . '%')->orderBy('surah_number', 'ASC')->paginate($this->sortingValue);

        $multiple_or_words_search_tab_three = SuraAyat::where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchTabThreeOne . '%')->where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchTabThreeTwo . '%')->where('sura_ayat_arabic_description', 'like', '%' . $this->multipleOrWordSearchTabThreeThree . '%')->orderBy('surah_number', 'ASC')->paginate($this->sortingValue);

        return view('livewire.app.arabic-search.multiple-word-and-seach-component', ['multiple_or_words_search' => $multiple_or_words_search, 'multiple_or_words_search_tab_two' => $multiple_or_words_search_tab_two, 'multiple_or_words_search_tab_three' => $multiple_or_words_search_tab_three])->layout('livewire.layouts.base');
    }
}
