<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    public function index () 
    {
        return view('contact');
    }

    public function sendMail(Request $request) 
    {
        $details = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Mail::to('admin@mail.fr')->send(new ContactMail($details));

        return back()->with('success', 'Nous avons reçu votre demande de contact');

    }
}
