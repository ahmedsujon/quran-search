<?php

namespace App\Http\Livewire\Admin\Imports;

use Livewire\Component;
use App\Imports\HadithReference;
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

        Excel::import(new HadithReference, $this->excel);
        $this->excel = '';
        $this->dispatchBrowserEvent('success', ['message' => 'Record added successfully']);
    }

    public function render()
    {
        return view('livewire.admin.imports.hadith-import-component')->layout('livewire.admin.layouts.base');
    }
}
