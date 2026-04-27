@php
    $links=[
        [
            'icon' => 'fa-solid fa-gauge',
            'name' => 'Dashboard',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard')
        ],
        [
            'icon' => 'fa-solid fa-cog',
            'name' => 'Opciones',
            'route' => route('admin.options.index'),
            'active' => request()->routeIs('admin.optiones.index')
        ],
        [
            // familias de productos
            'name' => 'Familias',
            'icon' => 'fa-solid fa-box-open',
            'route' => route('admin.families.index'),
            'active' => request()->routeIs('admin.families.*')
        ],
        [
            // categorias de productos
            'name' => 'Categorías',
            'icon' => 'fa-solid fa-tags',
            'route' => route('admin.categories.index'),
            'active' => request()->routeIs('admin.categories.*')
        ],
        [
            // subcategorias de productos
            'name' => 'Subcategorías',
            'icon' => 'fa-solid fa-tag',
            'route' => route('admin.subcategories.index'),
            'active' => request()->routeIs('admin.subcategories.*')
        ],
        [
            // productos
            'name' => 'Productos',
            'icon' => 'fa-solid fa-box',
            'route' => route('admin.products.index'),
            'active' => request()->routeIs('admin.products.*')
        ],
    ];
@endphp

<aside id="top-bar-sidebar"
    class="fixed top-3 left-0 z-40 w-64 h-full transition-transform -translate-x-full sm:translate-x-0 bg-white"
    :class="{
        'translate-x-0 ease-out':sidebarOpen,
        '-translate-x-full ease-in':!sidebarOpen
    }"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto border-e border-default">
        <a href="" class="flex items-center ps-2.5 mb-5">
            <img src="" class="h-6 me-3" alt="" />
            <span class="self-center text-lg text-heading font-semibold whitespace-nowrap"></span>
        </a>
        <ul class="space-y-2 font-medium">

            @foreach ($links as $link)
                <li>
                    <a href="{{$link['route']}}"
                        class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-gray-200 hover:text-fg-brand group {{ $link['active'] ? 'bg-gray-300' : '' }}">
                        <i class="{{$link['icon']}} text-gray-500"></i>
                        <span class="ml-2">{{$link['name']}}</span>
                    </a>
                </li>
            @endforeach
            
        </ul>
    </div>
</aside>