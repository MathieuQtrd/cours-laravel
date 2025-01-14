<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devis extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message']; // colonnes pouvant être remplies par le formulaire
}
