<?php

namespace App\Http\Livewire\App\EnglishSearch;

use App\Models\AyatWord;
use App\Models\SuraAyat;
use Livewire\Component;
use Livewire\WithPagination;

class TransliterationComponent extends Component
{
    use WithPagination;
    public $sortingValue = 20, $searchTerm;

    public $searchUsingTransliterationOne;
    public $searchUsingTransliterationTabTwoOne, $searchUsingTransliterationTabTwoTwo, $searchUsingTransliterationTabTwoThree;
    public $searchUsingTransliterationTabThreeOne, $searchUsingTransliterationTabThreeTwo, $searchUsingTransliterationTabThreeThree;

    public $tabStatus = 'tabOne';

    public function tabchnage($value)
    {
        $this->tabStatus = $value;
    }

    public function render()
    {
        $search_using_translitaration = AyatWord::where('translitaration_word', 'like', '%' . $this->searchUsingTransliterationOne . '%')
            ->paginate($this->sortingValue);

        // tab two
        $allDataTwo = collect([]);
        if ($this->searchUsingTransliterationTabTwoOne != null || $this->searchUsingTransliterationTabTwoTwo != null || $this->searchUsingTransliterationTabTwoThree != null) {
            if ($this->searchUsingTransliterationTabTwoOne != null) {
                $search_using_transliteration_two = AyatWord::where('translitaration_word', 'like', '%' . $this->searchUsingTransliterationTabTwoOne . '%')->get();
                foreach ($search_using_transliteration_two as $result) {
                    $allDataTwo->push($result);
                }
            }
            if ($this->searchUsingTransliterationTabTwoTwo != null) {
                $search_using_transliteration_two2 = AyatWord::where('translitaration_word', 'like', '%' . $this->searchUsingTransliterationTabTwoTwo . '%')->get();
                foreach ($search_using_transliteration_two2 as $result2) {
                    $allDataTwo->push($result2);
                }
            }
            if ($this->searchUsingTransliterationTabTwoThree != null) {
                $search_using_transliteration_two3 = AyatWord::where('translitaration_word', 'like', '%' . $this->searchUsingTransliterationTabTwoThree . '%')->get();
                foreach ($search_using_transliteration_two3 as $result3) {
                    $allDataTwo->push($result3);
                }
            }
        } else {
            $search_using_transla_searchall = AyatWord::all();
            foreach ($search_using_transla_searchall as $resultall) {
                $allDataTwo->push($resultall);
            }
        }
        $search_using_transliteration_two = $allDataTwo->sortBy('surah_number')->paginate($this->sortingValue);

        // tab three
        $search_using_transliteration_three = SuraAyat::where('sura_ayat_english_description', 'like', '%' . $this->searchUsingTransliterationTabThreeOne . '%')->where('sura_ayat_english_description', 'like', '%' . $this->searchUsingTransliterationTabThreeTwo . '%')->where('sura_ayat_english_description', 'like', '%' . $this->searchUsingTransliterationTabThreeThree . '%')->orderBy('surah_number', 'ASC')->paginate($this->sortingValue);
        
        return view('livewire.app.english-search.transliteration-component',[
            'search_using_translitaration' => $search_using_translitaration,
            'search_using_transliteration_two' => $search_using_transliteration_two,
            'search_using_transliteration_three'=>$search_using_transliteration_three
        ])->layout('livewire.layouts.base');
    }
}
