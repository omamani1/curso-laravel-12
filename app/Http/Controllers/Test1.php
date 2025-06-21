<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Test1 extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return "Invoke method called!";
    }

    public static function prueba()
    {
        DB::beginTransaction();
        try {
            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
            $task = new Task();
            $task->title = 'Sample Task';
            $task->description = 'This is a sample task description.';
            $task->user_id = $user->id;
            $task->save();
            DB::commit();
            Log::info('Confirmacion de la transaccion');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('Error en transaccion');
        }
    }
}
