@extends('layouts.main')

@section('content')
    <div class="bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-4">Ver Tarea</h1>

        <p><strong>Título:</strong> {{ $task->title }}</p>
        <p><strong>Descripción:</strong> {{ $task->description }}</p>
        <p><strong>Estado:</strong> {{ $task->status ? 'Completado' : 'Pendiente' }}</p>
        <p><strong>Etiquetas:</strong>
            @foreach($task->tags as $tag)
                <span class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm mr-1">{{ $tag->name }}</span>
            @endforeach
        </p>

        <a href="{{ route('tasks.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">Volver a la lista</a>
    </div>
@endsection