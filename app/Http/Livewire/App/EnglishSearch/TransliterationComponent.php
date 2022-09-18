<?php

namespace App\Http\Livewire\App\EnglishSearch;

use Livewire\Component;
use App\Models\AyatWord;
use App\Models\SuraAyat;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

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
        DB::statement("SET sql_mode = '' ");
        $search_using_transliteration_three = collect([]);
        if ($this->searchUsingTransliterationTabThreeOne != null || $this->searchUsingTransliterationTabThreeTwo != null || $this->searchUsingTransliterationTabThreeThree != null) {

            $collectionA = collect([]);
            if($this->searchUsingTransliterationTabThreeOne != null){
                $dataSets1 = AyatWord::where('translitaration_word', $this->searchUsingTransliterationTabThreeOne)->groupBy('surah_number')->groupBy('ayat_number')->get();
                foreach ($dataSets1 as $d1) {
                    if($this->searchUsingTransliterationTabThreeTwo != null){
                        $dataSets2 = AyatWord::where('surah_number', $d1->surah_number)->where('ayat_number', $d1->ayat_number)->where('translitaration_word', $this->searchUsingTransliterationTabThreeTwo)->get();

                        // dd($dataSets2);
                        foreach ($dataSets2 as $d2) {
                            if($this->searchUsingTransliterationTabThreeThree != null){
                                $dataSets3 = AyatWord::where('surah_number', $d2->surah_number)->where('ayat_number', $d2->ayat_number)->where('translitaration_word', $this->searchUsingTransliterationTabThreeThree)->get();
                                
                                foreach ($dataSets3 as $d3) {
                                    $getD3 = AyatWord::where('surah_number', $d3->surah_number)->where('ayat_number', $d3->ayat_number)->get();
                                    foreach($getD3 as $gd3){
                                        if (!$collectionA->contains($gd3)) {
                                            $collectionA->push($gd3);
                                        }
                                    }
                                }
                            }
                            else{
                                $getD2 = AyatWord::where('surah_number', $d2->surah_number)->where('ayat_number', $d2->ayat_number)->get();
                                foreach($getD2 as $gd2){
                                    if (!$collectionA->contains($gd2)) {
                                        $collectionA->push($gd2);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        $getD1 = AyatWord::where('surah_number', $d1->surah_number)->where('ayat_number', $d1->ayat_number)->get();
                        foreach($getD1 as $gd1){
                            if (!$collectionA->contains($gd1)) {
                                $collectionA->push($gd1);
                            }
                        }
                    }
                    
                }
            }

            $surahNumberCollection = collect([]);
            foreach ($collectionA as $colA) {
                if (!$surahNumberCollection->contains(['surah'=>$colA->surah_number, 'ayat'=>$colA->ayat_number])) {
                    $surahNumberCollection->push(['surah'=>$colA->surah_number, 'ayat'=>$colA->ayat_number]);
                }
            }

            foreach($surahNumberCollection as $actVal){
                $getData = SuraAyat::where('surah_number', $actVal['surah'])->where('ayat_number', $actVal['ayat'])->first();
                if (!$search_using_transliteration_three->contains($getData)) {
                    $search_using_transliteration_three->push($getData);
                }
            }
        } else {
            $multiple_or_words_searchAll = SuraAyat::all();
            foreach ($multiple_or_words_searchAll as $resultall) {
                $search_using_transliteration_three->push($resultall);
            }
        }
        $search_using_transliteration_three = $search_using_transliteration_three->paginate($this->sortingValue);
        
        return view('livewire.app.english-search.transliteration-component',[
            'search_using_translitaration' => $search_using_translitaration,
            'search_using_transliteration_two' => $search_using_transliteration_two,
            'search_using_transliteration_three'=>$search_using_transliteration_three
        ])->layout('livewire.layouts.base');
    }
}
