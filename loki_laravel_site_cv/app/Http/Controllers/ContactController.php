<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        ]);
        
        Mail::raw($validated['message'], function ($mail) use ($validated) {
            $mail->to('destinataire@mail.fr') // à remplacer
                 ->from($validated['email'], $validated['name'])
                 ->subject('Demande de contact');
        });
        

        return back()->with('success', 'Votre demande de contact a été envoyé.');
        // return redirect()->back(); // similaire
        // return redirect()->route('home'); // pour rediriger vers une route nommée 'home' Route::get('/', function  () { return view('index'); })->name('home');
        // return redirect('http://google.fr'); // vers une url extérieur
        // return redirect('/contact'); // vers une url locale
    }
}
