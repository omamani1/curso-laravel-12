<?php

namespace App\Console\Commands;

use App\Mail\TaskCreatedEmial;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-emails {correo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $correo = $this->argument('correo');
        $user = User::where('email', $correo)->first();
        if (!$user) {
            $this->error('User not found with the provided email.');
            return;
        }
        $task = $user->tasks()->first();
        if (!$task) {
            $this->error('No tasks found for the user.');
            return;
        }
        Mail::to($correo)->queue(new TaskCreatedEmial($task));
    }
}
