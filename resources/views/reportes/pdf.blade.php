<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestión de Tareas</title>
    <style>
        .thead {
            background: cyan;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="bg-white p-6 rounded-xl shadow-md">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="thead">
                <tr class="bg-gray-100">
                    <th class="p-2 text-left">Título</th>
                    <th class="p-2 text-left">Descripción</th>
                    <th class="p-2 text-left">Estado</th>
                    <th class="p-2 text-left">Tags</th>
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
                                    class="inline-block bg-blue-100 text-blue-700 px-2 py-1 rounded text-sm mr-1">{{ $tag->name }}
                                </span>
                            @endforeach
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>