<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index () 
    {
        $services = Service::all();
        return view('services.index', ['services' => $services]);
    }

    public function create () 
    {
        return view('services.create');
    }

    public function store (Request $request) 
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255|unique:services,service_name',
        ]);

        Service::create($validated);

        return redirect()->route('services.index')->with('success', 'Nouveau service enregistré');
    }

    public function edit (Service $service) 
    {
        return view('services.edit', ['service' => $service]);
    }

    public function update (Request $request, Service $service) 
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255|unique:services,service_name',
        ]);

        $service->update($validated); // permet de recevoir un tableau array

        // on peut également utiliser la methode save()
        // $service->service_name = $validated['service_name'];
        // $service->save();

        // on peut également remplir tous les attributs d'un coup
        // $service->fill($validated);
        // $service->save();

        return redirect()->route('services.index')->with('success', 'Modification effectuée');

    }

    public function destroy (Service $service) 
    {
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service supprimé');
    }
}
