<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AyatWord extends Model
{
    use HasFactory;

    protected $filable = [
        'unique_key',
        'surah_number',
        'ayat_number',
        'arabic_root_word',
        'arabic_root_word_harkat',
        'normalized_arabic_word',
        'normalized_arabic_word_harkat',
        'translitaration_word',
        'english_word_subject_category',
        'english_word_sub_subject_category',
        'word_sub_category_description',
        'inference_flag',
        'hadith_reference',
    ];

    public function hadithData(){
        return $this->belongsTo(Hadith::class, 'hadith_reference');
    }
}
