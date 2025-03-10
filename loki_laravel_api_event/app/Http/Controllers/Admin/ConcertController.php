<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Concert;

class ConcertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // affiche dans un vue la liste de tous les concerts créés (avec l'image)
        // un lien pour modifier et un (form) pour supprimer
        $concerts = Concert::all();
        return view('admin.concerts.index', ['concerts' => $concerts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // un formulaire de création 
        return view('admin.concerts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // on enregistre en bdd avec gestion de l'image
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,webp|max:2048',
        ]);

        if($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('concerts', 'public');
        }

        Concert::create($validated);

        return redirect()->route('admin.concerts.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Concert $concert)
    {
        // formulaire de mofification
        // dd($concert);
        return view('admin.concerts.edit', ['concert' => $concert]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Concert $concert)
    {
        // on enregistre les modifs
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|integer|min:0',
            'image' => 'image|mimes:png,jpg,jpeg,gif,webp|max:2048',
        ]);

        if($request->hasFile('image')) {
            if($concert->image) {
                storage::disk('public')->delete($concert->image);
            }
            $validated['image'] = $request->file('image')->store('concerts', 'public');
        }

        $concert->update($validated);

        return redirect()->route('admin.concerts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Concert $concert)
    {
        // on supprime en bdd
        if($concert->image) {
            Storage::disk('public')->delete($concert->image);
        }
        $concert->delete();

        return redirect()->route('admin.concerts.index');
    }
}
