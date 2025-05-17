<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Material') }}
        </h2>
    </x-slot>

    <div class="py-12 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded shadow">
            <form action="{{ route('materials.update', $material->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="cod_cens" class="block font-medium text-gray-700">Código Censal</label>
                    <input type="text" name="cod_cens" id="cod_cens" value="{{ old('cod_cens', $material->cod_cens) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('cod_cens') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="descripcion" class="block font-medium text-gray-700">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" value="{{ old('descripcion', $material->descripcion) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('descripcion') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="unidad" class="block font-medium text-gray-700">Unidad</label>
                    <input type="text" name="unidad" id="unidad" value="{{ old('unidad', $material->unidad) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('unidad') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="precio_unitario" class="block font-medium text-gray-700">Precio Unitario</label>
                    <input type="number" step="0.01" name="precio_unitario" id="precio_unitario" value="{{ old('precio_unitario', $material->precio_unitario) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('precio_unitario') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="cantidad" class="block font-medium text-gray-700">Cantidad</label>
                    <input type="number" name="cantidad" id="cantidad" value="{{ old('cantidad', $material->cantidad) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('cantidad') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end space-x-3">
                    <a href="{{ route('materials.index') }}" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">Cancelar</a>
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
