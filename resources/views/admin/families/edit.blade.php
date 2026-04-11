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
        'name' => $family->name,
    ],
]">

    <div class="card">

        <form action="{{route('admin.families.update', $family)}}" method="post">
            
            @csrf

            @method('put')

            <div class="mb-4">

                <x-label>Nombre</x-label>
                <x-input class="w-full" 
                    name="name" 
                    placeholder="Ingrese nombre de la familia del producto"
                    value="{{old('name', $family->name)}}"/>
                
            </div>

            <div class="flex justify-end">
                <x-button>Actualizar</x-button>
            </div>
        
        </form>

    </div>



</x-admin-layout>