<?php

namespace App\Http\Livewire\App\ArabicSearch;

use App\Models\AyatWord;
use App\Models\SuraAyat;
use Livewire\Component;
use Livewire\WithPagination;

class SinglWordSeachComponent extends Component
{
    use WithPagination;
    public $sortingValue = 20, $searchTerm;

    public $singleArabicRootWord;
    public $singleArabicRootWordSecenttab;
    public $singleArabicRootWordSecenttabThree;
    public $tabStatus = 'tabOne';

    public function tabchnage($value)
    {
        $this->tabStatus = $value;
    }

    public function render()
    {

        $searchTerm = preg_replace("~[\x{064B}-\x{065B}]~u", "", $this->singleArabicRootWord);
        $ayat_words = AyatWord::where('arabic_root_word_harkat', 'like', '%' . $searchTerm . '%')->paginate($this->sortingValue);

        $searchTerm2 = preg_replace("~[\x{064B}-\x{065B}]~u", "", $this->singleArabicRootWordSecenttab);
        $ayat_wordstabtwo = AyatWord::where('normalized_arabic_word_harkat', 'like', '%' . $searchTerm2 . '%')->paginate($this->sortingValue);

        $searchTerm3 = preg_replace("~[\x{064B}-\x{065B}]~u", "", $this->singleArabicRootWordSecenttabThree);
        $ayat_wordstabthree = SuraAyat::where('sura_ayat_arabic_description_harkat', 'like', '%' . $searchTerm3 . '%')->paginate($this->sortingValue);

        return view('livewire.app.arabic-search.singl-word-seach-component', ['ayat_words' => $ayat_words, 'ayat_wordstabtwo' => $ayat_wordstabtwo, 'ayat_wordstabthree'=>$ayat_wordstabthree])->layout('livewire.layouts.base');
    }
}
