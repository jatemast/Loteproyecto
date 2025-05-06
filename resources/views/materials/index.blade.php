<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Materiales') }}
        </h2>
    </x-slot>

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

                    <div class="overflow-x-auto relative">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                <tr class="border-b">
                                    <th scope="col" class="py-3 px-4">#</th>
                                    <th scope="col" class="py-3 px-4">Código Censal</th>
                                    <th scope="col" class="py-3 px-4">Descripción</th>
                                    <th scope="col" class="py-3 px-4">Unidad</th>
                                    <th scope="col" class="py-3 px-4">Precio Unitario</th>
                                    <th scope="col" class="py-3 px-4">Cantidad</th>
                                    <th scope="col" class="py-3 px-4">Valor</th>
                                    <th scope="col" class="py-3 px-4">Acciones</th>
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
                                            <a href="#" class="px-3 py-1 bg-amber-500 text-white text-xs font-medium rounded hover:bg-amber-600 transition duration-300 ease-in-out flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                                Editar
                                            </a>
                                            <form action="#" method="POST" class="inline">
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>