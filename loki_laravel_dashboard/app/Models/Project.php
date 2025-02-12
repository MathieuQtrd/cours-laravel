<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'owner_id', 'client_id', 'status'];


    // Many-to-one
    public function owner() : BelongsTo {
        return $this->belongsTo(User::class, 'owner_id');

        // $project->owner() : nous renverra le créateur du projet
    }

    // Many-to-one
    public function client() : BelongsTo {
        return $this->belongsTo(User::class, 'client_id');

        // $project->client() : nous renverra le client du projet
    }

    // One-to-many
    public function task() : HasMany {
        return $this->hasMany(Task::class); // concerne la colonne project_id sur la table tasks

        // $project->task() : nous renverra les taches liées à ce projet
    }

    // Many-to-many
    public function developers() : BelongsToMany {
        return $this->belongsToMany(User::class);
        // return $this->belongsToMany(User::class, project_user); // pas besoin de préciser en respectant la convention de nommage
        // return $this->belongsToMany(User::class, projects_developers); // si la table pivot est nommée sans respecter le nommage, il faut la préciser
        
        // $project->developers() : nous renverra la liste des developpeurs liés au projet via la table pivot
    }




}
