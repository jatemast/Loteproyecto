<x-app-layout>
    <x-slot name="header">
      
    </x-slot>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Registrar Material</h2>
                <a href="{{ route('materials.index') }}" class="px-3 py-2 bg-gray-600 text-white text-sm rounded-md hover:bg-gray-700 transition duration-300 ease-in-out flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Volver
                </a>
            </div>

            <form method="POST" action="{{ route('materials.store') }}">
                @csrf
                
                <div class="mb-4">
                    <label for="cod_cens" class="block text-sm font-medium text-gray-700 mb-1">Código Censal</label>
                    <input type="text" name="cod_cens" id="cod_cens" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Ej: MAT-001" required>
                </div>
                
                <div class="mb-4">
                    <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Descripción del material" required>
                </div>
                
                <div class="mb-4">
                    <label for="unidad" class="block text-sm font-medium text-gray-700 mb-1">Unidad</label>
                    <input type="text" name="unidad" id="unidad" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="Ej: Kg, Litro, Unidad" required>
                </div>
                
                <div class="mb-4">
                    <label for="precio_unitario" class="block text-sm font-medium text-gray-700 mb-1">Precio Unitario</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-sm">$</span>
                        </div>
                        <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" class="block w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="0.00" required>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="cantidad" class="block text-sm font-medium text-gray-700 mb-1">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500" placeholder="0" required>
                </div>
                
                <div class="flex items-center justify-between">
                    <button type="reset" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition duration-300 ease-in-out">
                        Limpiar
                    </button>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-300 ease-in-out flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM6.293 6.707a1 1 0 010-1.414l3-3a1 1 0 011.414 0l3 3a1 1 0 01-1.414 1.414L11 5.414V13a1 1 0 11-2 0V5.414L7.707 6.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        Guardar Material
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</x-app-layout>