<?php

namespace App\Http\Livewire\Admin\Author;

use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class AdminComponent extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $sortingValue = 10, $searchTerm;
    public $first_name, $last_name, $email, $phone, $password, $confirm_password, $avatar, $upload_vatar;

    public $edit_id, $delete_id;
    protected $listeners = ['deleteConfirmed' => 'deleteData'];

    public function storeData()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:admins',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        $data = new Admin();
        $data->first_name = $this->first_name;
        $data->last_name = $this->last_name;
        $data->phone = $this->phone;
        $data->email = $this->email;
        $data->password = Hash::make($this->password);

        if ($this->avatar != '') {
            $imageName = Carbon::now()->timestamp . '.' . $this->avatar->extension();
            $this->avatar->storeAs('profile', $imageName);
            $data->avatar = $imageName;
        }

        $data->save();
        $this->dispatchBrowserEvent('success', ['message' => 'Admin added successfully']);
        $this->dispatchBrowserEvent('closeModal');
    }


    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteData()
    {
        $data = Admin::find($this->delete_id);
        $data->delete();
        $this->dispatchBrowserEvent('adminDeleted');
    }

    public function render()
    {
        $admins = Admin::orderBy('created_at', 'DESC')
            ->where('first_name', 'like', '%' . $this->searchTerm . '%')
            ->where('last_name', 'like', '%' . $this->searchTerm . '%')
            ->where('email', 'like', '%' . $this->searchTerm . '%')
            ->paginate($this->sortingValue);
        return view('livewire.admin.author.admin-component', ['admins' => $admins])->layout('livewire.admin.layouts.base');
    }
}
