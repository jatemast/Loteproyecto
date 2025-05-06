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
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="hover:bg-gray-50">
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
                                                    <select name="role" class="border rounded-md text-gray-700 px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                                        <option value="">Seleccionar Rol</option>
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role->id }}" @if($user->hasRole($role->name)) selected @endif>
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
                        <div class="mt-4">
                            {{ $users->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>