<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendContactMail(Request $request)
    {
        // Validation des saisies utilisateur
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ], [
            'name.required' => 'Le champs nom est obligatoire.',
            'name.max' => 'Le champs nom doit avoir une taille inférieure à 255 charactères.',
        ]);

        // Contact::create([
        //     'name'  => $validated['name'],
        //     'email'  => $validated['email'],
        //     'message'  => $validated['message'],
        // ]);
        
        Contact::create($validated);

        /*
        Mail::raw($validated['message'], function ($mail) use ($validated) {
            $mail->to('destinataire@mail.fr') // à remplacer
                 ->from($validated['email'], $validated['name'])
                 ->subject('Demande de contact');
        });
        */

        return back()->with('success', 'Votre demande de contact a été envoyé.');
        // return redirect()->back(); // similaire
        // return redirect()->route('home'); // pour rediriger vers une route nommée 'home' Route::get('/', function  () { return view('index'); })->name('home');
        // return redirect('http://google.fr'); // vers une url extérieur
        // return redirect('/contact'); // vers une url locale
    }

    public function listeContacts () 
    {
        $contacts = Contact::all(); // récupère tout le contenu de la page
       
        // dump($contacts);

        // dd($contacts); // dump and die

        return view('contacts', ['contacts' => $contacts]);
    }


}
