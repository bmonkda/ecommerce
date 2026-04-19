<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Familias',
        'route' => route('admin.families.index'),
    ],
    [
        'name' => 'Nuevo',
    ],
]">

    <div class="card">

        <form action="{{route('admin.families.store')}}" method="post">
            
            @csrf

            <x-validation-errors class="mb-4"></x-validation-errors>

            <div class="mb-4">

                <x-label class="mb-2">Nombre</x-label>
                <x-input class="w-full" 
                    name="name" 
                    placeholder="Ingrese nombre de la familia del producto"
                    value="{{old('name')}}"/>
                
            </div>

            <div class="flex justify-end">
                <x-button>Guardar</x-button>
            </div>
        
        </form>

    </div>


</x-admin-layout>