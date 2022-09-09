<?php

namespace App\Http\Livewire\Admin\Imports;

use Livewire\Component;
use App\Imports\HadithImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class HadithImportComponent extends Component
{
    public $excel;
    use WithFileUploads;

    public function uploadHadithExcel()
    {
        $this->validate([
            'excel' => 'required',
        ]);
        Excel::import(new HadithImport, $this->excel);
        $this->excel = '';
        return "Record Uploaded Successfuly!";
    }

    public function render()
    {
        return view('livewire.admin.imports.hadith-import-component')->layout('livewire.admin.layouts.base');
    }
}
