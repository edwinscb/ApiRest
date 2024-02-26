<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [];

    /**
     * Get all of the projects for the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get all of the userHistories for the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userHistories()
    {
        return $this->hasMany(UserHistory::class);
    }

    /**
     * Get all of the tasks for the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
