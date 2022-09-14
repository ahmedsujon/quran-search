<?php

namespace App\Http\Livewire\Admin\Imports;
use Livewire\Component;
use App\Imports\AyatImport;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;


class AyatImportComponent extends Component
{
    public $excel;
    use WithFileUploads;

    public function uploaSuradExcel()
    {
        $this->validate([
            'excel' => 'required',
        ]);
        
        Excel::import(new AyatImport, $this->excel);
        $this->excel = '';
        $this->dispatchBrowserEvent('success', ['message' => 'Record added successfully']);
    }

    public function render()
    {
        return view('livewire.admin.imports.ayat-import-component')->layout('livewire.admin.layouts.base');
    }
}
