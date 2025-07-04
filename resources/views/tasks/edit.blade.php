{{-- @extends('layouts.main')

@section('content') --}}
<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-xl font-semibold mb-4">Editar Tarea</h1>
        <form method="POST" action="{{ route('tasks.update', $task) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-medium">Título</label>
                <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title', $task->title) }}">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Descripción</label>
                <textarea name="description"
                    class="w-full border rounded p-2">{{ old('description', $task->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Estado</label>
                <select name="status" class="w-full border rounded p-2">
                    <option value="0" {{ !$task->status ? 'selected' : '' }}>Pendiente</option>
                    <option value="1" {{ $task->status ? 'selected' : '' }}>Completado</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Etiquetas</label>
                @foreach($tags as $tag)
                    <label class="inline-flex items-center mr-2">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" {{ $task->tags->contains($tag->id) ? 'checked' : '' }} class="mr-1">
                        {{ $tag->name }}
                    </label>
                @endforeach
                @error('tags')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
            <a href="{{ route('tasks.index') }}" class="ml-2 text-gray-600 hover:underline">Cancelar</a>
        </form>
    </div>
</x-app-layout>