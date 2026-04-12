<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Categorías',
        'route' => route('admin.categories.index'),
    ],
    [
        'name' => $category->name,
    ],
]">
    <form action="{{route('admin.categories.update', $category)}}" method="post">

        @csrf
        
        @method('put')
        
        <div class="card">

            <x-validation-errors class="mb-4"></x-validation-errors>

            <div class="mb-4">
                <x-label class="mb-2">Familia</x-label>

                <x-select name="family_id" class="w-full">
                    @foreach ($families as $family)
                        <option value="{{$family->id}}"
                            @selected(old('family_id', $category->family_id) == $family->id)>
                            {{$family->name}}
                        </option>
                    @endforeach
                </x-select>

            </div>

            <x-label class="mb-2">Nombre</x-label>
            <x-input class="w-full" 
                name="name" 
                placeholder="Ingrese nombre de la categoría"
                value="{{old('name', $category->name)}}"/>
        </div>

        <div class="flex justify-end">
            <x-button>Actualizar</x-button>
        </div>

    </form>


</x-admin-layout>