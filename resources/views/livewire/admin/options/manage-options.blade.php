<div>
    
    <section class="rounded-lg bg-white shadow-lg">

        <header class="border-b border-gray-300 px-6 py-2">
            
            <div class="flex justify-between">            
                <h1 class="text-lg font-semibold text-gray-700">
                    Opciones
                </h1>

                <x-button wire:click="$set('openModal', true)">
                    Nuevo
                </x-button>
            </div>

        </header>


        <div class="p-6">

            <div class="space-y-6">

                @foreach ($options as $option)
                
                    <div class="p-6 rounded-lg border border-gray-300 relative">
                        
                        <div class="absolute -top-3 px-4 bg-white">
                            <span>
                                {{ $option->name }}
                            </span>
                        </div>

                        {{-- valores --}}
                        <div class="flex flex-wrap">
                            @foreach ($option->features as $feature)
                            
                                @switch($option->type)
                                    @case(1) 
                                        {{-- texto --}}
                                        <span class="bg-gray-200 text-gray-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-gray-700 dark:text-gray-300">
                                            {{ $feature->description}}
                                        </span>
                                        @break
                                    @case(2)
                                        {{-- color --}}
                                        <span class="inline-block h-6 w-6 shadow-lg rounded-full border-2 border-gray-300 mr-4" style="background-color: {{ $feature->value }}">

                                        </span>
                                        
                                        @break
                                    @default
                                        
                                @endswitch

                            @endforeach
                        </div>

                    </div>

                @endforeach

            </div>

        </div>

    </section>

    {{-- Modal --}}
    <x-dialog-modal wire:model="openModal">

        <x-slot name="title">
            Crear nueva opción
        </x-slot>

        <x-slot name="content">
           
            <div class="grid grid-cols-2 gap-6 mb-4">

                <div>

                    <x-label class="mb-1">
                        Nombre
                    </x-label>

                    <x-input 
                        wire:model="newOption.name"
                        class="w-full" 
                        placeholder="Por ejemplo: Tamaño, Color"/>

                </div>

                <div>

                    <x-label class="mb-1">
                        Tipo
                    </x-label>

                    <x-select 
                        wire:model="newOption.type"
                        class="w-full">
                        <option value="1">Texto</option>
                        <option value="2">Color</option>
                    </x-select>

                </div>

            </div>

            <div class="flex items-center mb-4">
                <hr class="flex-1">

                <span class="mx-4">
                    Valores
                </span>

                <hr class="flex-1">
            </div>

            @foreach ($newOption['features'] as $index => $feature)
            
                <div class="p-6 rounded-lg border border-gray-200">
                    
                    <div class="grid grid-cols-2 gap-6">

                        <div>
                            
                            <x-label class="mb-1">
                                Valor
                            </x-label>

                            <x-input class="w-full" 
                                placeholder="Ingrese el valor de la opción"/>

                        </div>

                        <div>

                            <x-label class="mb-1">
                                Descripción
                            </x-label>

                            <x-input class="w-full" 
                                placeholder="Ingrese una descripción"/>

                        </div>

                    </div>

                </div>
            
            @endforeach

        </x-slot>

        <x-slot name="footer">
        </x-slot>

    </x-dialog-modal>


</div>
