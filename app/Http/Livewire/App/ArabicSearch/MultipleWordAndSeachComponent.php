<?php

namespace App\Http\Livewire\App\ArabicSearch;

use Livewire\Component;
use App\Models\AyatWord;
use App\Models\SuraAyat;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

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
        DB::statement("SET sql_mode = '' ");

        $multiple_or_words_search = collect([]);

        if ($this->multipleOrWordSearchOne != null || $this->multipleOrWordSearchtwo != null || $this->multipleOrWordSearchthree != null) {

            $collectionA = collect([]);
            if($this->multipleOrWordSearchOne != null){
                $dataSets1 = AyatWord::where('arabic_root_word_harkat', pregReplace($this->multipleOrWordSearchOne))->groupBy('surah_number')->groupBy('ayat_number')->get();
                
                foreach ($dataSets1 as $d1) {
                    if($this->multipleOrWordSearchtwo != null){
                        $dataSets2 = AyatWord::where('surah_number', $d1->surah_number)->where('ayat_number', $d1->ayat_number)->where('arabic_root_word_harkat', pregReplace($this->multipleOrWordSearchtwo))->get();

                        // dd($dataSets2);
                        foreach ($dataSets2 as $d2) {
                            if($this->multipleOrWordSearchthree != null){
                                $dataSets3 = AyatWord::where('surah_number', $d2->surah_number)->where('ayat_number', $d2->ayat_number)->where('arabic_root_word_harkat', pregReplace($this->multipleOrWordSearchthree))->get();
                                
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
                if (!$multiple_or_words_search->contains($getData)) {
                    $multiple_or_words_search->push($getData);
                }
            }
        } else {
            $multiple_or_words_searchAll = SuraAyat::all();
            foreach ($multiple_or_words_searchAll as $resultall) {
                $multiple_or_words_search->push($resultall);
            }
        }
        $multiple_or_words_search = $multiple_or_words_search->paginate($this->sortingValue);




        //Tab 2
        $multiple_or_words_search_tab_two = collect([]);
        if ($this->multipleOrWordSearchTabTwoOne != null || $this->multipleOrWordSearchTabTwoTwo != null || $this->multipleOrWordSearchTabTwoThree != null) {

            $collectionB = collect([]);
            if($this->multipleOrWordSearchTabTwoOne != null){
                $dataSets2_1 = AyatWord::where('normalized_arabic_word_harkat', pregReplace($this->multipleOrWordSearchTabTwoOne))->groupBy('surah_number')->groupBy('ayat_number')->get();
                
                foreach ($dataSets2_1 as $d2_1) {
                    if($this->multipleOrWordSearchTabTwoTwo != null){
                        $dataSets2_2 = AyatWord::where('surah_number', $d2_1->surah_number)->where('ayat_number', $d2_1->ayat_number)->where('normalized_arabic_word_harkat', pregReplace($this->multipleOrWordSearchTabTwoTwo))->get();

                        // dd($dataSets2_2);
                        foreach ($dataSets2_2 as $d2_2) {
                            if($this->multipleOrWordSearchTabTwoThree != null){
                                $dataSets2_3 = AyatWord::where('surah_number', $d2_2->surah_number)->where('ayat_number', $d2_2->ayat_number)->where('normalized_arabic_word_harkat', pregReplace($this->multipleOrWordSearchTabTwoThree))->get();
                                
                                foreach ($dataSets2_3 as $d2_3) {
                                    $getD2_3 = AyatWord::where('surah_number', $d2_3->surah_number)->where('ayat_number', $d2_3->ayat_number)->get();
                                    foreach($getD2_3 as $gd2_3){
                                        if (!$collectionB->contains($gd2_3)) {
                                            $collectionB->push($gd2_3);
                                        }
                                    }
                                }
                            }
                            else{
                                $getD2_2 = AyatWord::where('surah_number', $d2_2->surah_number)->where('ayat_number', $d2_2->ayat_number)->get();
                                foreach($getD2_2 as $gd2_2){
                                    if (!$collectionB->contains($gd2_2)) {
                                        $collectionB->push($gd2_2);
                                    }
                                }
                            }
                        }
                    }
                    else{
                        $getD2_1 = AyatWord::where('surah_number', $d2_1->surah_number)->where('ayat_number', $d2_1->ayat_number)->get();
                        foreach($getD2_1 as $gd2_1){
                            if (!$collectionB->contains($gd2_1)) {
                                $collectionB->push($gd2_1);
                            }
                        }
                    }
                    
                }
            }

            $surahNumberCollection2 = collect([]);
            foreach ($collectionB as $colB) {
                if (!$surahNumberCollection2->contains(['surah'=>$colB->surah_number, 'ayat'=>$colB->ayat_number])) {
                    $surahNumberCollection2->push(['surah'=>$colB->surah_number, 'ayat'=>$colB->ayat_number]);
                }
            }

            foreach($surahNumberCollection2 as $actVal2){
                $getData = SuraAyat::where('surah_number', $actVal2['surah'])->where('ayat_number', $actVal2['ayat'])->first();
                if (!$multiple_or_words_search_tab_two->contains($getData)) {
                    $multiple_or_words_search_tab_two->push($getData);
                }
            }
        } else {
            $multiple_or_words_searchAll = SuraAyat::all();
            foreach ($multiple_or_words_searchAll as $resultall) {
                $multiple_or_words_search_tab_two->push($resultall);
            }
        }
        $multiple_or_words_search_tab_two = $multiple_or_words_search_tab_two->paginate($this->sortingValue);





        $multiple_or_words_search_tab_three = SuraAyat::where('sura_ayat_arabic_description_harkat', 'like', '%' . $this->multipleOrWordSearchTabThreeOne . '%')->where('sura_ayat_arabic_description_harkat', 'like', '%' . $this->multipleOrWordSearchTabThreeTwo . '%')->where('sura_ayat_arabic_description_harkat', 'like', '%' . $this->multipleOrWordSearchTabThreeThree . '%')->orderBy('surah_number', 'ASC')->paginate($this->sortingValue);

        return view('livewire.app.arabic-search.multiple-word-and-seach-component', ['multiple_or_words_search' => $multiple_or_words_search, 'multiple_or_words_search_tab_two' => $multiple_or_words_search_tab_two, 'multiple_or_words_search_tab_three' => $multiple_or_words_search_tab_three])->layout('livewire.layouts.base');
    }
}
