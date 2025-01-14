<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Devis;

class DevisController extends Controller
{
    public function create ()
    {
        return view('devis');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required|min:10',
        ]);

        Devis::create($validated);

        return back()->with('success', 'Votre demande de devis a été envoyé.');
    }

    public function listeDevis () 
    {
        $devis = Devis::all(); // récupère tout le contenu de la page
       
        // dump($contacts);

        // dd($contacts); // dump and die

        return view('liste_devis', ['devis' => $devis]);
    }

}
