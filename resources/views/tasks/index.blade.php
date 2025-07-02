{{-- @extends('layouts.app')


@section('content') --}}
<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Lista de Tareas</h1>
            <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+
                Nueva
                Tarea</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 text-left">Título</th>
                    <th class="p-2 text-left">Descripción</th>
                    <th class="p-2 text-left">Estado</th>
                    <th class="p-2 text-left">Tags</th>
                    <th class="p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr class="border-t">
                        <td class="p-2">{{ $task->title }}</td>
                        <td class="p-2">{{ $task->description }}</td>
                        <td class="p-2">{{ $task->status ? '✅' : '⏳' }}</td>
                        <td class="p-2">
                            @foreach($task->tags as $tag)
                                <span
                                    class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm mr-1">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('tasks.edit', $task) }}" class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- <div class="mt-6">
            {{ $tasks->links('pagination::tailwind') }}
        </div> --}}
    </div>
</x-app-layout>