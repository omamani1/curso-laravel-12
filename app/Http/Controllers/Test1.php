<?php

namespace App\Http\Controllers;
//  use App\Http\Controllers\Test1
use App\Models\Role;
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

            $role = new Role();
            $role->name = 'user';
            $role->save();
            Log::info(' role ', [
                'data' => $role
            ]);

            // Role::insert([
            //     "name" => 'admin'
            // ]);
            /*

            $user = User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
            $task = new Task();
            $task->title = 'Sample Task';
            $task->description = 'This is a sample task description.';
            $task->user_id = $user->id;
            $task->save();
            */
            DB::commit();
            Log::info('Confirmacion de la transaccion');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::info('Error en transaccion');
        }
    }


    public static function orm()
    {
        // $q = User::where('name', 'Else Green');
        // Log::info('SQL ', [
        //     'slq - ' => $q->toSql(),
        //     'params - ' => $q->getBindings(),
        // ]);

        // $userNames = User::get()->pluck('name');
        // Log::info('names ', [
        //     'data' => $userNames
        // ]);

        // $user = User::paginate(2);
        // Log::info('User', [
        //     'data' => $user
        // ]);


        // $user  = User::find(3);
        // $tasks = $user->tasks()->get();

        // Log::info('Task', [
        //     'data' => $tasks
        // ]);

        $user = User::with(['tasks', 'tasks.tags'])->find(1);
        Log::info('Users: ', [
            'data' => $user
        ]);
        // dump($user); 
        // $user3 = User::find(3);
        // dump($user3); 
    }
}
