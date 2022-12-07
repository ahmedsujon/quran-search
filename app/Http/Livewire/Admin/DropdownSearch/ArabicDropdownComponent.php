<?php

namespace App\Http\Livewire\Admin\DropdownSearch;

use App\Models\ArabicDropdown;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class ArabicDropdownComponent extends Component
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

        $data = new ArabicDropdown();
        $data->name = $this->name;
        $data->slug = $this->slug;
  
        $data->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Arabic Root Word Data Data added successfully']);
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
        $data = ArabicDropdown::find($this->delete_id);
        $data->delete();
        $this->dispatchBrowserEvent('adminDeleted');
    }

    public function render()
    {
        $arabic_dropdowns = ArabicDropdown::orderBy('created_at', 'DESC')->paginate($this->sortingValue);
        return view('livewire.admin.dropdown-search.arabic-dropdown-component', ['arabic_dropdowns'=>$arabic_dropdowns])->layout('livewire.admin.layouts.base');
    }
}
