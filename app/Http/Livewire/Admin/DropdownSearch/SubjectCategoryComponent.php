<?php

namespace App\Http\Livewire\Admin\DropdownSearch;

use App\Models\SubjectDropdown;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class SubjectCategoryComponent extends Component
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

        $data = new SubjectDropdown();
        $data->name = $this->name;
        $data->slug = $this->slug;
  
        $data->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Sub-Subject Sub-Category Data added successfully']);
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
        $data = SubjectDropdown::find($this->delete_id);
        $data->delete();
        $this->dispatchBrowserEvent('adminDeleted');
    }

    public function render()
    {
        $subject_dropdowns = SubjectDropdown::orderBy('created_at', 'DESC')->paginate($this->sortingValue);
        return view('livewire.admin.dropdown-search.subject-category-component', ['subject_dropdowns'=>$subject_dropdowns])->layout('livewire.admin.layouts.base');
    }
}
