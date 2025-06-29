<?php

namespace App\Http\Controllers;

use App\Models\Prueba;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return "Listado de tareas";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Prueba $prueba)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prueba $prueba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prueba $prueba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prueba $prueba)
    {
        //
    }

    public function miMetodo(Request $request)
    {
        return "Mi metodo " . $request->name;
    }

    public  function  prueba(Request $request)
    {
        $name = $request->name;
        $email = $request->input('email');
        $token = $request->header('token');
        Log::info($token);
        Log::debug("Token: " . $token);
        return "Prueba de ruta " . $name .  " Email : " . $email . " Token : " . $token;
    }

    public function updatePrueba(Request $request, string $id)
    {
        return "Recurso con ID {$id} actualizado.";
    }


    public function saludo()
    {
        $users = User::with('tasks')->get();
        Log::info('info', [
            'data' => $users
        ]);
        $tasks = Task::with('tags')->get();
        return view('index', compact('tasks'));
    }
}
