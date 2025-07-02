<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        Log::info($user);
        $tasks = Task::with('tags')->where('user_id', $user->id)->get();
        // $tasks = Task::with('tags')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('tasks.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
            'tags' => 'array',
        ]);

        $user = $request->user();
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status ?? false;
        $task->user_id = $user->id;
        $task->save();

        $task->tags()->sync($request->tags);

        return redirect()->route('tasks.index')->with('success', 'Tarea creada correctamente.');
    }

    public function edit(Task $task)
    {
        $user = Auth::user();
        $tags = Tag::where('user_id', $user->id);
        return view('tasks.edit', compact('task', 'tags'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'boolean',
            'tags' => 'array',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status ?? false,
        ]);

        $task->tags()->sync($request->tags);

        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada correctamente.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada correctamente.');
    }
}
