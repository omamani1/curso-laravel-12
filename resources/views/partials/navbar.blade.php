<nav class="bg-white shadow mb-6">
    <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
        <div class="text-lg font-semibold text-gray-700">Gestión</div>
        <div class="space-x-4">
            <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-blue-600">Tareas</a>
            <a href="{{ route('tags.index') }}" class="text-gray-700 hover:text-blue-600">Etiquetas</a>
        </div>
    </div>
</nav>