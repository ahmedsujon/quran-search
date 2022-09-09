<?php

namespace App\Imports;

use App\Models\SuraAyat;
use Maatwebsite\Excel\Concerns\ToModel;

class SuraImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SuraAyat([
            //
        ]);
    }
}
