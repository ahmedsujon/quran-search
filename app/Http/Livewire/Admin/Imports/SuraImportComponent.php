<?php

namespace App\Http\Livewire\Admin\Imports;

use App\Imports\SuraImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;


class SuraImportComponent extends Component
{
    public $excel;
    use WithFileUploads;

    public function uploadSuraExcel()
    {
        $this->validate([
            'excel' => 'required',
        ]);

        Excel::import(new SuraImport, $this->excel);
        $this->excel = '';
        $this->dispatchBrowserEvent('success', ['message' => 'Record added successfully']);
    }

    public function render()
    {
        return view('livewire.admin.imports.sura-import-component')->layout('livewire.admin.layouts.base');
    }
}
