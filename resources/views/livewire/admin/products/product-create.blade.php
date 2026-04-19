<div>

    <form wire:submit='store'>

        <figure class="mb-4 relative">

            <div class="absolute top-8 right-8">
                <label class="flex items-center px-4 py-2 rounded-lg bg-white cursor-pointer text text-gray-700">
                    <i class="fas fa-camera mr-2"></i>
                    Actualizar imagen

                    <input type="file" 
                        class="hidden"
                        accept="image/*"
                        wire:model='image'>

                </label>
            </div>

            <img class="aspect-[16/9] object-cover object-center w-full" 
                    src="{{ $image ? $image->temporaryUrl() : asset('img/no-image.png') }}" 
                    alt="">
        </figure>

        <x-validation-errors class="mb-4" />

        <div class="card">
        
            <div class="mb-4">
                <x-label class="mb-2">
                    SKU
                </x-label>

                <x-input class="w-full" 
                    placeholder="Ingrese el SKU del producto"
                    wire:model="product.sku"
                    />
            </div>

            <div class="mb4">
                <x-label class="mb-2">
                    Nombre
                </x-label>

                <x-input class="w-full" 
                    placeholder="Ingrese el nombre del producto"
                    wire:model="product.name"
                    />
            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Descripción
                </x-label>

                <x-textarea class="w-full"
                    rows="4" 
                    placeholder="Ingrese la descripción del producto"
                    wire:model="product.description">
                </x-textarea>
            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Familia
                </x-label>

                <x-select class="w-full" wire:model.live="family_id">
                    
                    <option value="" disabled>
                        Seleccione una familia
                    </option>

                    @foreach ($families as $family)
                        <option value="{{ $family->id }}">
                            {{ $family->name }}
                        </option>
                    @endforeach

                </x-select>

            </div>

            <div class="mb-4">

                <x-label class="mb-2">
                    Categoría
                </x-label>

                <x-select class="w-full" wire:model.live="category_id">
                    
                    <option value="" disabled>
                        Seleccione una categoría
                    </option>

                    @foreach ($this->categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                    
                </x-select>

            </div>

            <div class="mb-4">

                <x-label class="mb-2">
                    Subcategoría
                </x-label>

                <x-select class="w-full" wire:model.live="product.subcategory_id">
                    
                    <option value="" disabled>
                        Seleccione una subcategoría
                    </option>

                    @foreach ($this->subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">
                            {{ $subcategory->name }}
                        </option>
                    @endforeach
                    
                </x-select>

            </div>

            <div class="mb-4">
                <x-label class="mb-2">
                    Precio
                </x-label>

                <x-input class="w-full"
                    type="number"
                    step="0.01" 
                    placeholder="Ingrese el precio del producto"
                    wire:model="product.price"
                    />
            </div>

            <div class="flex justify-end">
                <x-button>
                    Crear producto
                </x-button>

            </div>

        </div>

    </form>

</div>