<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'tag_task', 'tag_id', 'task_id');
    }
}
