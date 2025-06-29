@extends('layouts.main')
@section('titulo', 'Create tarea');
@section('content')
    <div class="max-w-5xl mx-auto p-6">
        {{-- <h1 class="text-3xl font-bold mb-6 text-gray-800">📋 Lista de Tareas</h1>
        /task/id
        --}}
        <form method="POST" class="flex flex-col gap-4" action="{{ route('task.update', ['task' => $task->id]) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titulo</label>
                <input type="text" name="title" id="title" value="{{ $task->title }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <input type="text" name="description" id="description" value="{{ $task->description }}"
                    class="mt-1 w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="checkbox" name="status" id="status" checked="{{ $task->status}}"
                    class="mt-1 border border-gray-300 rounded-md shadow-sm p-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-200 font-semibold">
                    Crear
                </button>
            </div>
        </form>
    </div>
@endsection