<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <div style="margin-left: 8cm;">
                {{ __('Dashboard') }}
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-sidebar />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6" style="margin-left: 4cm;">
                <a href="{{ route('role_permission.index') }}" class="p-6 bg-blue-100 border border-blue-200 rounded-lg shadow hover:bg-blue-200">
                    <h3 class="text-lg font-semibold text-blue-800">Administrar Roles</h3>
                    <p class="text-sm text-blue-600">Gestiona los roles y permisos de los usuarios.</p>
                </a>
                <a href="{{ route('labor_tasks.index') }}" class="p-6 bg-green-100 border border-green-200 rounded-lg shadow hover:bg-green-200">
                    <h3 class="text-lg font-semibold text-green-800">Administrar Tareas</h3>
                    <p class="text-sm text-green-600">Gestiona las actividades y tareas laborales.</p>
                </a>
                <a href="{{ route('materials.index') }}" class="p-6 bg-yellow-100 border border-yellow-200 rounded-lg shadow hover:bg-yellow-200">
                    <h3 class="text-lg font-semibold text-yellow-800">Administrar Materiales</h3>
                    <p class="text-sm text-yellow-600">Gestiona los materiales necesarios para los proyectos.</p>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
