<?php

namespace App\Http\Livewire\Admin\DropdownSearch;

use App\Models\Dropdown;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class DropdownComponent extends Component
{
    use WithPagination;

    public $sortingValue = 10, $searchTerm;
    public $name, $slug;

    public $edit_id, $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeData()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);

        $data = new Dropdown();
        $data->name = $this->name;
        $data->slug = $this->slug;
  
        $data->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Dropdown search added successfully']);
        $this->dispatchBrowserEvent('closeModal');
        $this->resetInputs();
    }

    public function resetInputs()
    {
        $this->name = '';
        $this->slug = '';
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $data = Dropdown::find($this->delete_id);
        $data->delete();
        $this->dispatchBrowserEvent('adminDeleted');
    }

    public function render()
    {
        $dropdowns = Dropdown::orderBy('created_at', 'DESC')->paginate($this->sortingValue);
        return view('livewire.admin.dropdown-search.dropdown-component', ['dropdowns'=>$dropdowns])->layout('livewire.admin.layouts.base');
    }
}
