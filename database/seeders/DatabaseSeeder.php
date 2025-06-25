<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Tag;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        // Role::factory(2)->create();
        // Role::factory()->admin()->create();
        // $user = User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // $task = new Task();
        // $task->title = 'Sample Task';
        // $task->description = 'This is a sample task description.';
        // $task->user_id = $user->id;
        // $task->save();

        // $task1 = new Task();
        // $task1->title = 'Sample Task1';
        // $task1->description = 'This is a sample task1 description.';
        // $task1->user_id = $user->id;
        // $task1->save();

        // $tagList = ['urgent', 'important', 'work', 'personal'];
        // foreach ($tagList as $tagName) {
        //     $tag = Tag::firstOrCreate(['name' => $tagName]);
        //     $task->tags()->attach($tag->id);
        // }
        // $tag1 = new Tag();
        // $tag1->name = 'nuevo';
        // $tag1->save();
        // $tag2 = new Tag();
        // $tag2->name = 'nuevo1';
        // $tag2->save();
        // $task1->tags()->attach([$tag1->id, $tag2->id]);
    }
}
