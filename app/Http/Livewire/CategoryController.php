<?php

namespace App\Http\Livewire;

use Livewire\{Component, WithFileUploads, WithPagination};
use App\Models\Category;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Component
{
    use WithFileUploads, WithPagination;

    public $name, $image, $selected_id, $page_title, $component_name;

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function mount()
    {
        $this->page_title = 'Listado';
        $this->component_name = 'Categorías';
    }

    public function render()
    {
        $categories = Category::all();

        return view('livewire.category.category', compact('categories'))
        ->extends('category.index')
        ->section('content');
    }

    public function Edit($id)
    {
        $category = Category::findOrFail($id);

        $this->name = $category->name;
        $this->selected_id = $category->id;
        $this->image = null;

        $this->emit('show-modal', 'show modal!');
    }

    public function Store()
    {
        $rules = [
            'name' => 'required|unique:categories|min:3'
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.unique' => 'Esta categoria ya esta registrado',
            'name.min' => 'Escriba al menos tres caracteres',
        ];

        $this->validate($rules, $messages);

        $category = Category::create([
            'name' => $this->name,
        ]);

        $customFileName;

        if( $this->image ) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories', $customFileName);
            $category->image = $customFileName;
            $category->save();
        }

        $this->resetUI();

        $this->emit('category-added', 'registered!');
    }

    public function Update()
    {
        $rules = [
            'name' => 'required|min:3|unique:categories,name,'.$this->selected_id,
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.unique' => 'Esta categoria ya esta registrado',
            'name.min' => 'Escriba al menos tres caracteres',
        ];

        $this->validate($rules, $messages);

        $category = Category::find($this->selected_id);
        $category->update([
            'name' => $this->name,
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('public/categories', $customFileName);
            $imageName = $category->image;
            $category->image = $customFileName;
            $category->save();

            if ($imageName != null) {
                if (file_exists('storage/categories/' . $imageName)) {
                    unlink('storage/categories/' . $imageName);
                }
            }

        }

        $this->resetUI();

        $this->emit('category-updated', 'updated!');
    }

    public function Destroy($id)
    {
        $category = Category::findOrFail($id);

        $imageName = $category->image;

        $category->delete();

        if ($imageName != null) {
            unlink('storage/categories/' . $imageName);
        }

        $this->resetUI();

        $this->emit('category-deleted', 'deleted!');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->image = null;
        $this->selected_id = 0;
    }
}
