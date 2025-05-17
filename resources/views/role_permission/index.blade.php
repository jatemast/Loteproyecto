<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight" style="margin-left: 8cm;">
            {{ __('Gestión de Usuarios y Roles') }}
        </h2>
    </x-slot>
    <x-sidebar />

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="margin-left: 4cm;">
            <!-- Contenedor principal con el margen izquierdo de 4cm -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <!-- Filtro de búsqueda mejorado y colocado en la parte superior -->
                    <div class="mb-6">
                        <h4 class="text-md font-medium text-gray-700 mb-2">Filtrar Usuarios:</h4>
                        <div class="flex items-center border border-gray-300 rounded-lg shadow-sm bg-white py-2 px-3">
                            <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input id="searchInput" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" type="text" placeholder="Buscar por nombre de usuario..." aria-label="Buscar usuario">
                            <button id="clearSearch" class="flex-shrink-0 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-1 px-3 rounded transition duration-150 ease-in-out" type="button">
                                Limpiar
                            </button>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Escriba para filtrar usuarios dinámicamente</p>
                    </div>
                    
                    <!-- Mensajes de éxito con mejor estilo -->
                    @if(session('success'))
                        <div class="mb-4 px-4 py-3 bg-green-100 border border-green-400 text-green-700 rounded">
                            <span class="font-medium">¡Éxito!</span> {{ session('success') }}
                        </div>
                    @endif
                    
                    <!-- Listar Usuarios y Roles con mejor estilo -->
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Usuarios y Roles Asignados</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nombre del Usuario
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Roles Asignados
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Actualizar Rol
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="usersTableBody">
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50 user-row" data-username="{{ strtolower($user->name) }}">
                                        <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                            <div class="flex items-center">
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">{{ $user->name }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                            <div class="flex flex-wrap gap-1">
                                                @foreach($user->roles as $role)
                                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        {{ $role->name }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 border-b border-gray-200 text-sm">
                                            <!-- Formulario para actualizar rol de usuario -->
                                            <form action="{{ route('role_permission.updateUserRole', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="flex items-center space-x-2">
                                                    <select name="role" class="form-control">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}"
                                                                {{ $user->roles->first()?->name === $role->name ? 'selected' : '' }}>
                                                                {{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="px-3 py-2 text-sm font-medium text-white bg-green-600 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                                        Actualizar
                                                    </button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                
                                <!-- Mensaje cuando no hay resultados -->
                                <tr id="noResultsRow" class="hidden">
                                    <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">
                                        No se encontraron usuarios con ese criterio de búsqueda.
                                    </td>
                                </tr>
                                
                                @if(count($users) == 0)
                                    <tr>
                                        <td colspan="3" class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-center text-gray-500">
                                            No hay usuarios registrados.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Paginación si es necesario -->
                    @if(method_exists($users, 'links'))
                        <div class="mt-4" id="pagination">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Script para el filtrado dinámico -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearButton = document.getElementById('clearSearch');
            const userRows = document.querySelectorAll('.user-row');
            const noResultsRow = document.getElementById('noResultsRow');
            const paginationElement = document.getElementById('pagination');

            // Función para filtrar las filas de usuarios
            function filterUsers() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                let visibleCount = 0;
                
                userRows.forEach(row => {
                    const username = row.dataset.username;
                    if (username.includes(searchTerm)) {
                        row.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        row.classList.add('hidden');
                    }
                });
                
                // Mostrar mensaje cuando no hay resultados
                if (visibleCount === 0 && userRows.length > 0) {
                    noResultsRow.classList.remove('hidden');
                } else {
                    noResultsRow.classList.add('hidden');
                }
                
                // Ocultar paginación durante la búsqueda
                if (paginationElement && searchTerm !== '') {
                    paginationElement.classList.add('hidden');
                } else if (paginationElement) {
                    paginationElement.classList.remove('hidden');
                }
            }
            
            // Evento de entrada en el campo de búsqueda
            searchInput.addEventListener('input', filterUsers);
            
            // Evento para el botón de limpiar
            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                filterUsers();
                searchInput.focus();
            });
        });
    </script>
</x-app-layout>