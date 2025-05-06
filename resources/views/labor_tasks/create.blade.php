<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar labor y costo') }}
        </h2>
    </x-slot>
<body class="bg-gray-50">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-3xl mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">Administración de Labor y Costos</h1>
                <p class="text-gray-500">Complete el formulario para registrar una nueva labor</p>
            </div>

            <form method="POST" action="{{ route('labor_tasks.store') }}" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Primera columna -->
                    <div class="space-y-6">
                        <div>
                            <label for="clasificacion" class="block text-sm font-medium text-gray-700">Clasificación</label>
                            <input type="text" name="clasificacion" id="clasificacion" 
                                class="mt-1 block w-full px-3 py-2 border border-gray-300
                                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        
                        <div>
                            <label for="item" class="block text-sm font-medium text-gray-700">Item</label>
                            <input type="number" name="item" id="item"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300
                                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        
                        <div>
                            <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300
                                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        
                        <div>
                            <label for="unidad_medida" class="block text-sm font-medium text-gray-700">Unidad de Medida</label>
                            <input type="text" name="unidad_medida" id="unidad_medida"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300
                                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>
                    
                    <!-- Segunda columna -->
                    <div class="space-y-6">
                        <div>
                            <label for="valor_prefijado_a" class="block text-sm font-medium text-gray-700">Valor Tipo A</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" step="0.01" name="valor_prefijado_a" id="valor_prefijado_a"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full
                                    pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="valor_prefijado_b" class="block text-sm font-medium text-gray-700">Valor Tipo B</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">$</span>
                                </div>
                                <input type="number" step="0.01" name="valor_prefijado_b" id="valor_prefijado_b"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 block w-full
                                    pl-7 pr-12 sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                        </div>
                        
                        <div>
                            <label for="definicion" class="block text-sm font-medium text-gray-700">Definición</label>
                            <input type="text" name="definicion" id="definicion"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300
                                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm" required>
                        </div>
                        
                        <div>
                            <label for="cantidad" class="block text-sm font-medium text-gray-700">Cantidad</label>
                            <input type="number" name="cantidad" id="cantidad"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300
                                rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                focus:border-indigo-500 sm:text-sm" required>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center justify-end mt-8">
                    <button type="button" onclick="window.history.back()" 
                        class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm
                        font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2
                        focus:ring-offset-2 focus:ring-indigo-500 mr-4">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent
                        shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600
                        hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2
                        focus:ring-indigo-500">
                        Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
