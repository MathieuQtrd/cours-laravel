<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'project_id', 'assigned_to', 'status'];

    // Relation Many-to-one
    public function project() : BelongsTo {
        return $this->belongsTo(Project::class);
        // Laravel s'attend à une clé étrangère {model}_id
        // Sinon il faudrait la préciser
        // Utilisation : $task->project() : nous renverra le projet lié
    }

    // Relation Many-to-one
    public function assignedUser() : BelongsTo {
        return $this->belongsTo(User::class, 'assigned_to');
        // Laravel s'attend à une clé étrangère {model}_id
        // Sinon il faudrait la préciser
        // Utilisation : $task->assignedUser() : nous renverra le user (développeur) lié
    }
}
