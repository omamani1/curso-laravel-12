<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Lista de Etiquetas</h1>
            <a href="{{ route('tags.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+
                Nueva
                Etiqueta</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 text-left">Nombre</th>
                    <th class="p-2 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                    <tr class="border-t">
                        <td class="p-2">{{ $tag->name }}</td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('tags.edit', $tag) }}" class="text-yellow-600 hover:underline">Editar</a>
                            <form action="{{ route('tags.destroy', $tag) }}" method="POST" class="inline">
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
            {{ $tags->links('pagination::tailwind') }}
        </div> --}}
    </div>
</x-app-layout>