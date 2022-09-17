<?php

namespace App\Http\Livewire\App\ArabicSearch;

use App\Models\AyatWord;
use App\Models\SuraAyat;
use Livewire\Component;
use Livewire\WithPagination;

class MultipleWordOrSeachComponent extends Component
{
    use WithPagination;
    public $sortingValue = 20, $searchTerm;
    public $multipleWordSearch, $multipleWordSearchTwo, $multipleWordSearchThree;
    public $multipleWordSearchTabTwoOne, $multipleWordSearchTabTwoTwo, $multipleWordSearchTabTwoThree;
    public $multipleWordSearchTabThreeOne, $multipleWordSearchTabThreeTwo, $multipleWordSearchTabThreeThree;
    public $tabStatus = 'tabOne';

    public function tabchnage($value)
    {
        $this->tabStatus = $value;
    }

    public function render()
    {

        $allData = collect([]);
        if ($this->multipleWordSearch != null || $this->multipleWordSearchTwo != null || $this->multipleWordSearchThree != null) {
            if ($this->multipleWordSearch != null) {
                $multiple_words_search = AyatWord::where('arabic_root_word_harkat', 'like', '%' . pregReplace($this->multipleWordSearch) . '%')->get();
                foreach ($multiple_words_search as $result) {
                    if (!$allData->contains($result)) {
                        $allData->push($result);
                    }
                }
            }
            if ($this->multipleWordSearchTwo != null) {
                $multiple_words_search2 = AyatWord::where('arabic_root_word_harkat', 'like', '%' . pregReplace($this->multipleWordSearchTwo) . '%')->get();
                foreach ($multiple_words_search2 as $result2) {
                    if (!$allData->contains($result2)) {
                        $allData->push($result2);
                    }
                }
            }
            if ($this->multipleWordSearchThree != null) {
                $multiple_words_search3 = AyatWord::where('arabic_root_word_harkat', 'like', '%' . pregReplace($this->multipleWordSearchThree) . '%')->get();
                foreach ($multiple_words_search3 as $result3) {
                    if (!$allData->contains($result3)) {
                        $allData->push($result3);
                    }
                }
            }
        } else {
            $multiple_words_searchall = AyatWord::all();
            foreach ($multiple_words_searchall as $resultall) {
                $allData->push($resultall);
            }
        }
        $multiple_words_search = $allData->sortBy('surah_number')->paginate($this->sortingValue);

        // tab two
        $allDataTwo = collect([]);
        if ($this->multipleWordSearchTabTwoOne != null || $this->multipleWordSearchTabTwoTwo != null || $this->multipleWordSearchTabTwoThree != null) {
            if ($this->multipleWordSearchTabTwoOne != null) {
                $multiple_words_search_tab_two = AyatWord::where('normalize_word', 'like', '%' . $this->multipleWordSearchTabTwoOne . '%')->get();
                foreach ($multiple_words_search_tab_two as $result) {
                    $allDataTwo->push($result);
                }
            }
            if ($this->multipleWordSearchTabTwoTwo != null) {
                $multiple_words_search_tab_two2 = AyatWord::where('normalize_word', 'like', '%' . $this->multipleWordSearchTabTwoTwo . '%')->get();
                foreach ($multiple_words_search_tab_two2 as $result2) {
                    $allDataTwo->push($result2);
                }
            }
            if ($this->multipleWordSearchTabTwoThree != null) {
                $multiple_words_search_tab_two3 = AyatWord::where('normalize_word', 'like', '%' . $this->multipleWordSearchTabTwoThree . '%')->get();
                foreach ($multiple_words_search_tab_two3 as $result3) {
                    $allDataTwo->push($result3);
                }
            }
        } else {
            $multiple_words_searchall = AyatWord::all();
            foreach ($multiple_words_searchall as $resultall) {
                $allDataTwo->push($resultall);
            }
        }
        $multiple_words_search_tab_two = $allDataTwo->sortBy('surah_number')->paginate($this->sortingValue);

        // tab three
        $allDataThree = collect([]);
        if ($this->multipleWordSearchTabThreeOne != null || $this->multipleWordSearchTabThreeTwo != null || $this->multipleWordSearchTabThreeThree != null) {
            if ($this->multipleWordSearchTabThreeOne != null) {
                $multiple_words_search_tab_three = SuraAyat::where('ayat_arabic_description', 'like', '%' . $this->multipleWordSearchTabThreeOne . '%')->get();
                foreach ($multiple_words_search_tab_three as $result) {
                    $allDataThree->push($result);
                }
            }
            if ($this->multipleWordSearchTabThreeTwo != null) {
                $multiple_words_search_tab_three2 = SuraAyat::where('ayat_arabic_description', 'like', '%' . $this->multipleWordSearchTabThreeTwo . '%')->get();
                foreach ($multiple_words_search_tab_three2 as $result2) {
                    $allDataThree->push($result2);
                }
            }
            if ($this->multipleWordSearchTabThreeThree != null) {
                $multiple_words_search_tab_three3 = SuraAyat::where('ayat_arabic_description', 'like', '%' . $this->multipleWordSearchTabThreeThree . '%')->get();
                foreach ($multiple_words_search_tab_three3 as $result3) {
                    $allDataThree->push($result3);
                }
            }
        } else {
            $multiple_words_searchall3 = SuraAyat::all();
            foreach ($multiple_words_searchall3 as $resultall3) {
                $allDataThree->push($resultall3);
            }
        }

        $multiple_words_search_tab_three = $allDataThree->sortBy('surah_number')->paginate($this->sortingValue);

        return view('livewire.app.arabic-search.multiple-word-or-seach-component', [
            'multiple_words_search' => $multiple_words_search,
            'multiple_words_search_tab_two' => $multiple_words_search_tab_two,
            'multiple_words_search_tab_three' => $multiple_words_search_tab_three
        ])->layout('livewire.layouts.base');
    }
}
