<?php

namespace App\Imports;

use App\Models\AyatWord;
use App\Models\SuraAyat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AyatImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $ayatimport = new AyatWord();
        $ayatimport->unique_key                         = $row['unique_key'];
        $ayatimport->surah_number                       = $row['surah_number'];
        $ayatimport->ayat_number                        = $row['ayat_number'];
        $ayatimport->arabic_root_word                   = $row['arabic_root_word'];
        $ayatimport->normalized_arabic_word             = $row['normalized_arabic_word'];
        $ayatimport->translitaration_word               = $row['translitaration_word'];
        $ayatimport->english_word_subject_category      = $row['english_word_subject_category'];
        $ayatimport->english_word_sub_subject_category  = $row['english_word_sub_subject_category'];
        $ayatimport->word_sub_category_description      = $row['word_sub_category_description'];
        $ayatimport->inference_flag                     = $row['inference_flag'];
        $ayatimport->hadith_reference                   = $row['hadith_reference'];
        $ayatimport->save();

        $sura = SuraAyat::where('surah_number', $row['surah_number'])->where('ayat_number', $row['ayat_number'])->first();
        if($sura->arabic_root_word == null){
            $sura->arabic_root_word = $row['arabic_root_word'];
            $sura->normalized_arabic_word = $row['normalized_arabic_word'];
            $sura->translitaration_word = $row['translitaration_word'];
            $sura->english_word_subject_subject_category = $row['english_word_subject_category'];
            $sura->english_word_sub_subject_sub_subject_category = $row['english_word_sub_subject_category'];
        }
        else{
            $sura->arabic_root_word = $sura->arabic_root_word.','.$row['arabic_root_word'];
            $sura->normalized_arabic_word = $sura->normalized_arabic_word.','.$row['normalized_arabic_word'];
            $sura->translitaration_word = $sura->translitaration_word.','.$row['translitaration_word'];
            $sura->english_word_subject_subject_category = $sura->english_word_subject_subject_category.','.$row['english_word_subject_category'];
            $sura->english_word_sub_subject_sub_subject_category = $sura->english_word_sub_subject_sub_subject_category.','.$row['english_word_sub_subject_category'];
        }
        $sura->save();
    }
}
