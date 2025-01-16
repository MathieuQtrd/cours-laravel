<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class EmployeController extends Controller
{
    public function index () 
    {
        // On récupère la liste des employés avec leur service
        $employes = Employe::with('service')->get();
        return view('employes.index', ['employes' => $employes]);
    }

    public function create () 
    {
        $services = Service::all(); // pour mettre les services dans un select option
        return view('employes.create', ['services' => $services]);
    }

    public function store (Request $request) 
    {
        $validated = $request->validate([
            'fristname'     => 'required|string|max:255',
            'lastname'      => 'required|string|max:255',
            'email'         => 'required|email|unique:employes,email',
            'hiring_date'   => 'required|date',
            'salary'        => 'required|numeric|min:0',
            'service_id'    => 'required|exists:services,id',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            // Il faudra exécuter la commande suivante pour permettre le lien symbolique entre stroage et public
            // php artisan storage:link
            $validated['photo'] = $path;
        }

        Employe::create($validated);

        return back()->with('success', 'Nouvel employé enregistré');
    }

    public function edit (Employe $employe) 
    {
        // tous les champs sauf la photo sont pré remplis par les informations de l'employé
        // On récupère les services pour le formulaire et il faudra faire en sorte que le service de l'employé soit pré sélectionné
        $services = Service::all();
        return view('employes.edit', ['services' => $services, 'employe' => $employe]);
    }

    public function update (Request $request, Employe $employe) 
    {
        // lors de la mise à jour il faut controller que l'email n'existe pas déjà dans la table sauf pour celui que l'on modifie, pour cele, on précise l'id de l'employé sur la contrainte pour l'exclure du controle
        // 'email'         => 'required|email|unique:employes,email,' . $employe->id,

        // pour la photo, si une nouvelle photo a été chargé, on fait le même traitement que lors du create sinon rien
        // Il faut penser à supprimer l'ancienne photo si une nouvelle est chargée.
        $validated = $request->validate([
            'fristname'     => 'required|string|max:255',
            'lastname'      => 'required|string|max:255',
            'email'         => 'required|email|unique:employes,email,' . $employe->id,
            'hiring_date'   => 'required|date',
            'salary'        => 'required|numeric|min:0',
            'service_id'    => 'required|exists:services,id',
            'photo'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if($request->hasFile('photo')) {
            if($employe->photo) {
                Storage::disk('public')->delete($employe->photo); // on supprime l'ancienne photo
            }
            $path = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $path;
        }

        $employe->update($validated);

        return redirect()->route('employes.index')->with('success', 'Modification ok !');
    }

    public function destroy (Employe $employe) 
    {
        // Il faut penser à supprimer l'ancienne photo si on supprime un employé
        if($employe->photo) {
            Storage::disk('public')->delete($employe->photo); // on supprime l'ancienne photo
        }

        $employe->delete();

        return redirect()->route('employes.index')->with('success', 'Suppression ok !');
    }

    public function show (Employe $employe) 
    {
        // ce serait bien d'avoir une page permettant de faire une fiche employé
        // Pour aller plus loin faire en sorte que le service soit un lien renvoyant sur la vue index en filtrant par service (vous créez une nouvelle methode) 
        return view('employes.show', ['employe' => $employe]);
    }

    // public function listByService (Request $request) 
    // {
    //     $query = Employe::with('service');
    //     if($request->has('service_id')) {
    //         $query->where('service_id', $request->get('service_id'));
    //     }

    //     $employes = $query->get();

    //     return view('employes.index', ['employes' => $employes]);
    // }

    public function listByService ($serviceName = null) 
    {
        $query = Employe::with('service');
        if($serviceName) {
            $service = Service::where('service_name', $serviceName)->first();
            if($service) {
                $query->where('service_id', $service->id);
            }
        }

        // $employes = $query->get();
        $employes = $query->orderBy('hiring_date', 'asc')->get();

        return view('employes.index', ['employes' => $employes]);
    }
}
