<?php

namespace App\Imports;

use App\Models\Hadith;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
 
    public function model(array $row)
    {
        $hadithimport = new Hadith();
        $hadithimport->hadith_referance   = $row['hadith_referance'];
        $hadithimport->hadith_description = $row['hadith_description'];
        $hadithimport->save();
    }
}
