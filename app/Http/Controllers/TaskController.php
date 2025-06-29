<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = 3;
        $tasks = Task::with('tags')->where("user_id", $userId)->get();
        return view("task.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("task.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $titulo = $request->title;
        $description = $request->description;
        $status = !!$request->status;

        Task::create([
            'user_id' => 3,
            'title' => $titulo,
            'description' => $description,
            'status' => $status
        ]);
        return response()->redirectTo('/tasks')->with('success', 'Se registro correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
        return view("task.show", ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::find($id);
        $task->title  = $request->title;
        $task->description  = $request->description;
        $task->status = !!$request->status;
        $task->save();
        return response()->redirectTo('/tasks')->with('success', 'Se actualizo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return response()->redirectTo('/tasks')->with('success', 'Se elimino');
    }
}
