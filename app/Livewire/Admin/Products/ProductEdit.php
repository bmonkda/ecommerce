<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Family;
use App\Models\Subcategory;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductEdit extends Component
{
    // trait para importar imagenes con Livewire
    use WithFileUploads;

    public $product;
    public $productEdit;

    public $families;
    public $family_id = '';
    public $category_id = '';

    public $image;

    public function mount($product)
    {
      $this->productEdit = $product->except('id', 'created_at','updated_at');
      $this->families = Family::all();
    //   dd($product->subcategory->category->toArray());
      $this->category_id = $product->subcategory->category->id;
      $this->family_id = $product->subcategory->category->family_id;    
    }

    // se ejecuta cada vez que se renderiza la vista
    public function boot()
    {
        $this->withValidator(function($validator){
            if ($validator->fails()) {
                $this->dispatch('swal', [
                    'icon' => 'error',
                    'title' => '¡Error!',
                    'text' => 'El formulario contiene errores.',
                ]);
            }
        });
    }

    public function UpdatedFamilyId()
    {
        $this->category_id = '';
        $this->productEdit['subcategory_id'] = '';
    }

    public function UpdatedCategoryId()
    {
        $this->productEdit['subcategory_id'] = '';
    }

    #[Computed()]
    public function categories()
    {
        if ($this->family_id) {
            return Category::where('family_id', $this->family_id)->get();
        }
        return collect([]);   
    }

    #[Computed()]
    public function subcategories()
    {
        if ($this->category_id) {
            return Subcategory::where('category_id', $this->category_id)->get();
        }
        return collect([]);
    }

    

    public function render()
    {
        return view('livewire.admin.products.product-edit');
    }
}
