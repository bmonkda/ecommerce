<?php

namespace App\Livewire\Admin\Subcategories;

use App\Models\Category;
use App\Models\Family;
use Livewire\Attributes\Computed;
use Livewire\Component;

class SubcategoryEdit extends Component
{
    public $subcategory;

    public $families;

    public $subcategoryEdit;

    public function mount($subcategory)
    {
        $this->families = Family::all();

        $this->subcategoryEdit = [
            'family_id' => $subcategory->category->family_id,
            'category_id' => $subcategory->category_id,
            'name' => $subcategory->name
        ];

    }

    function updatedSubcategoryEditFamilyId()
    {
        $this->subcategoryEdit['category_id'] = '';   
    }

    #[Computed()]
    function categories() 
    {
        if (!$this->subcategoryEdit['family_id']) {
            return collect();
        }
        return Category::where('family_id', $this->subcategoryEdit['family_id'])->get();
    }

    function save()
    {
        $this->validate([
            'subcategoryEdit.family_id' => 'required|exists:families,id',
            'subcategoryEdit.category_id' => 'required|exists:categories,id',
            'subcategoryEdit.name' => 'required'
        ],
        [

        ],
        [
            'subcategoryEdit.family_id' => 'familia',
            'subcategoryEdit.category_id' => 'categoría',
            'subcategoryEdit.name' => 'nombre'
        ]);

        $this->subcategory->update($this->subcategoryEdit);

        // se comenta esta parte porque al actualizar la subcategoría, se quiere enviar una notificación al usuario sin recargar la página, y el método session()->flash() no funciona correctamente en este caso, ya que se pierde la información de la sesión al recargar la página. En su lugar, se puede usar el método $this->dispatch() para enviar un evento a Livewire, y luego escuchar ese evento en el componente para mostrar la notificación.
        
        // session()->flash('swal', [
        //     'title' => '¡Bien hecho!',
        //     'text' => 'La subcategoría ha sido actualizada correctamente.',
        //     'icon' => 'success'
        // ]);

        // se puede usar el método $this->dispatch() para enviar un evento a Livewire, y luego escuchar ese evento en el componente para mostrar la notificación.
        $this->dispatch('swal', [
            'title' => '¡Bien hecho!',
            'text' => 'La subcategoría ha sido actualizada correctamente.',
            'icon' => 'success'
        ]);

        // se comenta esta parte porque al actualizar la subcategoría, se quiere enviar una notificación al usuario sin recargar la página.
        // return redirect()->route('admin.subcategories.edit', $this->subcategory);
    }

    public function render()
    {
        return view('livewire.admin.subcategories.subcategory-edit');
    }
}
