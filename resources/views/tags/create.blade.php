{{-- @extends('layouts.main')

@section('content') --}}

<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-xl font-semibold mb-4">Crear Etiqueta</h1>
        <form method="POST" action="{{ route('tags.store') }}">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre</label>
                <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name') }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Guardar</button>
            <a href="{{ route('tags.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
</x-app-layout>