<!-- resources/views/reportes/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reporte') }}
        </h2>
    </x-slot>
            <x-sidebar />


    <div class="flex items-center justify-center h-[70vh]">
        <div class="text-center p-6 bg-white rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                Este módulo está en proceso
            </h1>
            <p class="text-gray-600">
                Muchas gracias por tu paciencia.
            </p>
        </div>
    </div>
</x-app-layout>
