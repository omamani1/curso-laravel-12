@extends('layouts.main')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-xl font-semibold mb-4">Editar Etiqueta</h1>
        <form method="POST" action="{{ route('tags.update', $tag) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nombre</label>
                <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name', $tag->name) }}">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
            <a href="{{ route('tags.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
@endsection