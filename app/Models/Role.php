<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // Role::factory()->create()
    use HasFactory;
    // protected $fillable = ['name'];

    protected $table = 'roles';
    
    protected $fillable = [
        'name'
    ];
    /**
     * The users that belong to the role.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get the role's name.
     */
    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }
}
