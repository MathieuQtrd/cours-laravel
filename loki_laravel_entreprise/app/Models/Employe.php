<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employe extends Model
{
    protected $fillable = [
        'fristname',
        'lastname',
        'email',
        'hiring_date',
        'salary',
        'service_id',
        'photo',
        // 'service_secondaire_id',
    ];
    // protected $guarded = []; // sinon on peut exclure les champs qui ne sont pas remplissable
    // ne pas utiliser les deux. $guarded est prioritaire sur $fillable mais cel apourrait créer des conflits

    
    protected $casts = [
        'hiring_date' => 'date', // transforme en objet Carbon (extension de DateTime)
    ];
    // casts possibles : integer, boolean, date, datetime, array, collection, float (à éviter), json, timestamp, encrypted
    
    public function service()
    {
        // relation de type ManyToOne ou OneToOne
        // pour des relations de type ManyToMany : belongsToMany()
        return $this->belongsTo(Service::class);
    }
    // dans nos vues : {{ $employe->service->service_name }}

    // public function serviceSecondaire()
    // {
    //     // relation de type ManyToOne ou OneToOne
    //     // pour des relations de type ManyToMany : belongsToMany()
    //     return $this->belongsTo(Service::class, 'service_secondaire_id');
    // }
    // dans nos vues : {{ $employe->serviceSecondaire->service_name }}


    /*
    Accessor : dans notre cas pour récupérer l'url de la photo
        - Un accessor permet de créer un attribut sur notre objet employe
        - en bdd le chemin conservé sera relatif : l'accessor nous permettra de récupérer l'url complete
        - ici on obtiendra $employe->photo_url
        - Convention d'écriture : getMonAttributeExempleAttribute() => $objet->mon_attribut_exemple
        - Les accessor sont automatiquement appelé lors de la récupération des données via ce model
        - https://laravel.com/docs/11.x/eloquent-mutators#value-object-casting
    */

    public function getPhotoUrlAttribute()
    {
        if($this->photo) {
            return Storage::url($this->photo); // url de la photo
        }
        // s'il n'y a pas de photo on envoie une photo par défaut
        return asset('images/defaut_photo.png');
    }

    // Pour modifier automatiquement une valeur avant son insertion en bdd : Mutator
    // public function setFirstnameAttribute($value) { $this->attributes['firstname'] = ucfirst($value); }
    // https://laravel.com/docs/11.x/eloquent-mutators#value-object-casting


    /*
        L'outil Storage de laravel permet de gérer les fichiers (local, public, cloud) :
        --------------------------------------------------------------------------------
        - config/filesystems.php

        public place les fichiers dans storage/app/public :
        il nous faudra exécuter sur la console :
        php artisan storage:link
        afin de les rendre disponibles des public/storage 

        cela crée un lien symbolique entre les deux dossiers

        // stocker un fichier photo dans le disque public :
        $path = $request->file('photo')->store('photos', 'public');
        // $path représente le chemin relatif que l'on stockera en bdd : exemple : photos/fichier.jpg

        // Pour supprimer un fichier
        Storage::disk('public')->delete($employe->photo);

        // Pour afficher le fichier dans une vue
        <img src="{{ Storage::url($employe->photo) }}">

        // En passant par l'accessor, nous appliquons le Storage::url() en amont et cela nous permet d'avoir le bon chemin directement dans un  nouvel attribut créé via l'accessor : $employe->photo_url
        <img src="{{ $employe->photo_url }}">

    */

    // Création d'un nouvel attribut pour obtenir le nom et le prénom en une seule chaine via un accessor
    // {{ $employe->full_name }}
    public function getFullNameAttribute()
    {
        return ucfirst($this->lastname) . ' ' . ucfirst($this->fristname);
    }



}
