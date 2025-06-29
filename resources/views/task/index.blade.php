@extends('layouts.main')
@section('titulo', 'Listado de tareas');
@section('content')
    @if(session('success'))
        <div class="mb-4 text-green-600 font-medium">
            <p>{{ session('success') }}</p>
        </div>
    @endif
    <div class="max-w-5xl mx-auto p-6">
        <a href="/tasks/create">Crear nueva tarea</a>
        <h1 class="text-3xl font-bold mb-6 text-gray-800">📋 Lista de Tareas</h1>
        @foreach ($tasks as $task)
            <div
                class="bg-white rounded-lg shadow mb-4 p-5 border-l-4 {{ $task->status ? 'border-green-500' : 'border-yellow-500' }}">
                <div class="flex justify-between items-center mb-2">
                    <h2 class="text-xl font-semibold text-gray-800">
                        {{ $task->title }}
                    </h2>
                    <span class="text-sm {{ $task->status ? 'text-green-600' : 'text-yellow-600' }}">
                        {{ $task->status ? '✅ Completada' : '⏳ Pendiente' }}
                    </span>
                </div>

                @if ($task->description)
                    <p class="text-gray-600 mb-3">{{ $task->description }}</p>
                @endif

                <!-- Etiquetas -->
                <div class="flex flex-wrap gap-2">
                    @forelse ($task->tags as $tag)
                        <span class="bg-purple-100 text-purple-800 text-sm font-medium px-3 py-1 rounded-full">
                            #{{ $tag->name }}
                        </span>
                    @empty
                        <span class="text-sm text-gray-400">Sin etiquetas</span>
                    @endforelse
                </div>
                <a href={{"tasks/" . $task->id}}> Ver detalles </a>
                <a href={{"tasks/" . $task->id . '/edit'}}> Editar </a>
                <form method="POST" action="{{ route('task.destroy', ['task' => $task->id])}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection