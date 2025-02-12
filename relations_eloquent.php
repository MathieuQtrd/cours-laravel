<?php 



//------------------------------------
// One-to-One (hasOne() / belongsTo())
//------------------------------------

// hasOne()
// Un modèle possède un autre modèle.

class User extends Model {
    public function profile() {
        return $this->hasOne(Profile::class);
    }
}
$user = User::find(1);
$profile = $user->profile; // Retourne le profil associé à l'utilisateur

// belongsTo()
// Un modèle appartient à un autre modèle.

class Profile extends Model {
    public function user() {
        return $this->belongsTo(User::class);
    }
}
$profile = Profile::find(1);
$user = $profile->user; // Retourne l'utilisateur lié au profil


//--------------------------------------
// One-to-Many (hasMany() / belongsTo())
//--------------------------------------

// hasMany()
// Un modèle possède plusieurs autres modèles.

class User extends Model {
    public function posts() {
        return $this->hasMany(Post::class);
    }
}
$user = User::find(1);
$posts = $user->posts; // Retourne tous les posts de cet utilisateur

// belongsTo()
// Un modèle appartient à un autre modèle.

class Post extends Model {
    public function user() {
        return $this->belongsTo(User::class);
    }
}
$post = Post::find(1);
$user = $post->user; // Retourne l'utilisateur qui a écrit cet article


//-------------------------------
// Many-to-Many (belongsToMany())
//-------------------------------
// Laravel utilise une table pivot pour gérer cette relation.
// Une table pivot est une table intermédiaire qui relie deux tables
// Elle ne contient que deux clés étrangères
// Une table pivot doit être nommée en combinant les noms des modèles en ordre alphabétique. Sinon il faudra la préciser dans la relation

// Les tables doivent être au pluriel et les models au singulier
// les tables pivot se réfèrent aux models et sont donc nommés au singulier
// exemple :
// Table users : Model User
// Table roles : Model Role
// Table pivot : role_user

// belongsToMany()
class User extends Model {
    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}
class Role extends Model {
    public function users() {
        return $this->belongsToMany(User::class);
    }
}

$user = User::find(1);
$roles = $user->roles; // Retourne tous les rôles de cet utilisateur

$role = Role::find(2);
$users = $role->users; // Retourne tous les utilisateurs ayant ce rôle

$user->roles()->attach(2); // Ajoute le rôle avec l'ID 2
$user->roles()->detach(2); // Supprime le rôle avec l'ID 2
$user->roles()->sync([1, 3]); // Remplace les rôles actuels par les IDs 1 et 3

// Si la table ne respecte pas le nommage : 
public function projects() {
    return $this->belongsToMany(Project::class, 'projects_developers');
}


//---------------------
// Relation Polymorphic
//---------------------
// L’intérêt d'une relation polymorphique est de réutiliser une même table pour plusieurs modèles
// Exemple : Les commentaires sur plusieurs types de contenus
// Sans relation polymorphique :

// table comments pour les articles (post_id).
// table video_comments pour les vidéos (video_id).

// avec une relation polymorphique

// table comments
Schema::create('comments', function (Blueprint $table) {
    $table->id();
    $table->text('content');
    $table->morphs('commentable'); // Crée `commentable_id` et `commentable_type`
    $table->timestamps();
});

// Modèle Comment.php
class Comment extends Model {
    public function commentable() {
        return $this->morphTo(); // morphTo() permet de savoir à quel modèle appartient le commentaire.
    }
}

// Modèle Post.php
class Post extends Model {
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

// Modèle Video.php
class Video extends Model {
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}


$post = Post::find(1);
$post->comments()->create(['content' => 'Super article !']); // Ajouter un commentaire à une vidéo

// Au niveau de la table :
// commentable_id = 1 (l'ID du post)
// commentable_type = 'App\Models\Post'
// content = 'Super article !'

$video = Video::find(1);
$video->comments()->create(['content' => 'Très belle vidéo !']); // Récupérer tous les commentaires d’un article

$post->comments; // Retourne tous les commentaires liés à l'article // Récupérer le modèle associé à un commentaire

$comment = Comment::find(1);
$commentable = $comment->commentable; // Retourne soit un `Post`, soit une `Video`

//---------------------------------------------------------------
// Polymorphic One-to-Many (morphOne() / morphMany() / morphTo())
//---------------------------------------------------------------
// Une relation polymorphique permet à plusieurs modèles d'être liés à un même modèle.

// morphOne()

class User extends Model {
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}

class Post extends Model {
    public function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}

$user = User::find(1);
$image = $user->image; // Retourne l'image associée à l'utilisateur

// morphMany()

class Post extends Model {
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}

$post = Post::find(1);
$comments = $post->comments; // Retourne tous les commentaires du post

// morphTo()

class Comment extends Model {
    public function commentable() {
        return $this->morphTo();
    }
}

$comment = Comment::find(1);
$commentable = $comment->commentable; // Retourne l'objet associé (Post, Video, etc.)

//-----------------------------------------------------------
// Polymorphic Many-to-Many (morphToMany() / morphedByMany())
//-----------------------------------------------------------
// Une relation polymorphique Many-to-Many permet à plusieurs modèles de partager une relation commune avec un autre modèle.

// morphToMany()
class Post extends Model {
    public function tags() {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}

$post = Post::find(1);
$tags = $post->tags; // Retourne tous les tags du post

// morphedByMany()
class Tag extends Model {
    public function posts() {
        return $this->morphedByMany(Post::class, 'taggable');
    }
}

$tag = Tag::find(1);
$posts = $tag->posts; // Retourne tous les posts liés à ce tag

// Dans ce cas le nommage de la table attendue sera taggable avec un s
// taggables
// cette table contiendra la clé étrangère du tag la clé étrangère du model lié et son type 
// id	            bigint	    Clé primaire de la table pivot
// tag_id	        bigint	    Clé étrangère vers la table tags
// taggable_id	    bigint	    ID du modèle parent (posts.id)
// taggable_type	string	    Type du modèle parent (App\Models\Post)
// created_at	    timestamp	Date d’ajout du lien
// updated_at	    timestamp	Date de mise à jour du lien

// Une table pivot polymorphique a une clé primaire (id) et des timestamps (created_at, updated_at) car elle gère plusieurs types de modèles dynamiquement, ce qui nécessite un suivi plus précis des relations.

// Convention de nommage pour la table pivot : nom du model + able 
// il est possible de choisir un autre nom :
class Post extends Model {
    public function tags() {
        return $this->morphToMany(Tag::class, 'tag_relation');
    }
}
// nom de la table pivot (au pluriel) :
// tag_relations


//------------------------------
// Methodes liées au relations :
//------------------------------

// with()	        Charge les relations en même temps que le modèle	User::with('posts')->get();
// load()	        Charge les relations après la récupération d’un modèle	$user->load('posts');
// withCount()	    Compte le nombre de relations	User::withCount('posts')->get();
// exists()	        Vérifie si une relation existe	$user->posts()->exists();
// doesntExist()	Vérifie si une relation n’existe pas	$user->posts()->doesntExist();