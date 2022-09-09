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
        $ayat_words = AyatWord::where('arabic_root_word', 'like', '%' . $this->singleArabicRootWord . '%')->paginate($this->sortingValue);
        $ayat_wordstabtwo = AyatWord::where('normalized_arabic_word', 'like', '%' . $this->singleArabicRootWordSecenttab . '%')->paginate($this->sortingValue);
        $ayat_wordstabthree = SuraAyat::where('sura_ayat_arabic_description', 'like', '%' . $this->singleArabicRootWordSecenttabThree . '%')->paginate($this->sortingValue);

        return view('livewire.app.arabic-search.singl-word-seach-component', ['ayat_words' => $ayat_words, 'ayat_wordstabtwo' => $ayat_wordstabtwo, 'ayat_wordstabthree'=>$ayat_wordstabthree])->layout('livewire.layouts.base');
    }
}
