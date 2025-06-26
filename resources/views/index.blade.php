@extends('layouts.main')

@section('titulo', 'Esto es index')

@section('main')
    @foreach ($users as $user)
        <p> {{ $user->email }} </p>
        <ul>
            @foreach ($user->tasks as $task)
                <li>{{ $task->title }}</li>
            @endforeach
        </ul>
    @endforeach
    <x-card titulo="Titulo de x-card" descripcion="Descripcion de x-card">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eligendi nobis hic officia, ducimus reprehenderit
            quam eum id vel atque corrupti excepturi magnam! Voluptates repellat eos itaque, in iusto modi?
        </p>
    </x-card>
    <x-card titulo="Titulo de x-card" descripcion="Descripcion de x-card">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eligendi nobis hic officia, ducimus reprehenderit
            quam eum id vel atque corrupti excepturi magnam! Voluptates repellat eos itaque, in iusto modi?
        </p>
    </x-card>
@endsection