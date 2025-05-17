<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materiales') }}
        </h2>
    </x-slot>
        <x-sidebar />

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-2xl font-bold text-gray-800">Materiales Registrados</h1>
                        <a href="{{ route('materials.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition duration-300 ease-in-out flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                            </svg>
                            Agregar Material
                        </a>
                    </div>

                    <!-- Campo de búsqueda -->
                    <div class="mb-4">
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input
                                type="text"
                                id="searchInput"
                                class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                placeholder="Buscar por código, descripción, unidad..."
                                autocomplete="off"
                            >
                        </div>
                    </div>

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500" id="materialsTable">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr class="border-b">
                                    <th class="py-3 px-4">#</th>
                                    <th class="py-3 px-4">Código Censal</th>
                                    <th class="py-3 px-4">Descripción</th>
                                    <th class="py-3 px-4">Unidad</th>
                                    <th class="py-3 px-4">Precio Unitario</th>
                                    <th class="py-3 px-4">Cantidad</th>
                                    <th class="py-3 px-4">Valor</th>
                                    <th class="py-3 px-4">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($materials as $material)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="py-3 px-4">{{ $material->id }}</td>
                                    <td class="py-3 px-4">{{ $material->cod_cens }}</td>
                                    <td class="py-3 px-4">{{ $material->descripcion }}</td>
                                    <td class="py-3 px-4">{{ $material->unidad }}</td>
                                    <td class="py-3 px-4 text-right">$ {{ number_format($material->precio_unitario, 2) }}</td>
                                    <td class="py-3 px-4 text-center">{{ $material->cantidad ?? 'N/A' }}</td>
                                    <td class="py-3 px-4 text-right font-medium">$ {{ number_format($material->valor, 2) }}</td>
                                    <td class="py-3 px-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('materials.edit', $material->id) }}" class="px-3 py-1 bg-amber-500 text-white text-xs font-medium rounded hover:bg-amber-600 transition duration-300 ease-in-out flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                Editar
                                            </a>
                                            <form action="{{ route('materials.destroy', $material->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs font-medium rounded hover:bg-red-600 transition duration-300 ease-in-out flex items-center" onclick="return confirm('¿Está seguro que desea eliminar este material?')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                    </svg>
                                                    Eliminar
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                                <!-- Fila para mostrar cuando no hay resultados de búsqueda -->
                                <tr id="noResultsRow" class="hidden">
                                    <td colspan="8" class="py-6 px-4 text-center text-gray-500">
                                        No se encontraron materiales que coincidan con la búsqueda.
                                    </td>
                                </tr>

                                <!-- Fila para mostrar cuando no hay materiales -->
                                @if(count($materials) === 0)
                                <tr id="emptyDataRow">
                                    <td colspan="8" class="py-6 px-4 text-center text-gray-500">
                                        No hay materiales registrados.
                                        <div class="mt-2">
                                            <a href="{{ route('materials.create') }}" class="text-blue-600 hover:text-blue-800">
                                                Agregar un nuevo material
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script para la búsqueda dinámica -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const table = document.getElementById('materialsTable');
            const rows = table.querySelectorAll('tbody tr:not(#noResultsRow):not(#emptyDataRow)');
            const noResultsRow = document.getElementById('noResultsRow');

            function filterTable() {
                const searchTerm = searchInput.value.trim().toLowerCase();
                let visibleCount = 0;

                rows.forEach(row => {
                    const cells = Array.from(row.querySelectorAll('td:not(:last-child)'));
                    const text = cells.map(cell => cell.textContent.trim().toLowerCase()).join(' ');

                    if (text.includes(searchTerm)) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });

                if (visibleCount === 0 && searchTerm !== '' && rows.length > 0) {
                    noResultsRow.classList.remove('hidden');
                } else {
                    noResultsRow.classList.add('hidden');
                }
            }

            searchInput.addEventListener('input', filterTable);

            if (searchInput.value) {
                filterTable();
            }
        });
    </script>
</x-app-layout>
