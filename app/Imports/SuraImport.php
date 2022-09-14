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
        $suraimport->save();
    }
}
