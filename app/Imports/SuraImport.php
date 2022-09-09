<?php

namespace App\Imports;

use App\Models\SuraAyat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SuraImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $suraimport = new SuraAyat();
        $suraimport->surah_number                                       = $row['surah_number'];
        $suraimport->ayat_number                                        = $row['ayat_number'];
        $suraimport->sura_ayat_english_description                      = $row['sura_ayat_english_description'];
        $suraimport->sura_ayat_arabic_description                       = $row['sura_ayat_arabic_description'];
        $suraimport->relavant_ayat                                      = $row['relavant_ayat'];
        $suraimport->surah_name                                         = $row['surah_name'];
        $suraimport->arabic_root_word                                   = $row['arabic_root_word'];
        $suraimport->normalized_arabic_word                             = $row['normalized_arabic_word'];
        $suraimport->translitaration_word                               = $row['translitaration_word'];
        $suraimport->english_word_subject_subject_category              = $row['english_word_subject_subject_category'];
        $suraimport->english_word_sub_subject_sub_subject_category      = $row['english_word_sub_subject_sub_subject_category'];
        $suraimport->save();
    }
}
