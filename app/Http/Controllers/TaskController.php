<?php

namespace App\Http\Controllers;

use App\Exports\TaskExport;
use App\Mail\TaskCreatedEmial;
use App\Models\Task;
use App\Models\Tag;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->per_page ?? 3;
        $user = Auth::user();
        // Log::info($user->isAdmin() ? 'Admin' : 'Normal');
        // Gate::authorize('is-admin');
        // $tasks = Task::with('tags')->where('user_id', $user->id)->get();
        $tasks = Task::with('tags')->where('user_id', $user->id)->paginate($perPage);
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
            'description' => ['nullable', 'string'],
            'status' => 'boolean',
            'tags' => 'array',
            'imagen' => 'image'
        ]);

        $image = $request->file('imagen');
        // $url = time() . '.' . $image->getClientOriginalExtension();
        // $image->move(public_path('imagenes'), $url);

        $url = $image->store('imagenes', 'public');

        Log::info($url);
        $user = $request->user();
        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status ?? false;
        $task->user_id = $user->id;
        $task->imagen = $url;
        $task->save();

        Mail::to('mmmm@gamil.com')->send(new TaskCreatedEmial($task));
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


    public function exportarPDF()
    {
        $user = Auth::user();
        $tasks = Task::with('tags')->where('user_id', $user->id)->get();
        $pdf  = Pdf::loadView('reportes.pdf', compact('tasks'));
        return $pdf->download('reporte-tasks.pdf');
    }

    public function exportarExcel()
    {
        // $user = Auth::user();
        return  Excel::download(new TaskExport(), 'reportes-excel.xlsx');
    }
}
