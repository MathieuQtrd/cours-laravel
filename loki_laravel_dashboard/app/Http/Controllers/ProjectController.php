<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\User;


class ProjectController extends Controller
{
    public function index () 
    {
        // $user = auth()->user();
        // $user = Auth::user();

        /** @var User $user */
        $user = Auth::user();

        // $projects;

        if($user->hasRole('admin')) {
            $projects = Project::with(['developers', 'client'])->get();
            return view('admin.projects.index', ['projects' => $projects]);
        } elseif($user->hasRole('developpeur')) {
            $projects = $user->projects()->with(['developers', 'client'])->get();
            return view('developpeur.projects.index', ['projects' => $projects]);
        } elseif($user->hasRole('client')) {
            $projects = Project::where('client_id', $user->id)->with(['developers', 'client'])->get();
            return view('client.projects.index', ['projects' => $projects]);
        }
        return view('dashboard');
    }

    public function create ()  
    {
        $clients = User::role('client')->get();
        $developers = User::role('developpeur')->get();

        return view('admin.projects.create', ['clients' => $clients, 'developers' => $developers]);
    }

    public function store (Request $request)  
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'client_id' => 'required|exists:users,id',
            'developers' => 'nullable|array',
        ]);

        $project = Project::create([
            'title' => $request->title,
            'description' => $request->description,
            'client_id' => $request->client_id,
            'owner_id' => Auth::id(),
        ]);

        if($request->developers) {
            $project->developers()->attach($request->developers);
        }
        return redirect()->route('admin.projects.index')->with('success', 'Nouveau projet ' . $request->title . ' créé avec succés.');
    }

    public function edit ()  
    {

    }

    public function update ()  
    {
        
    }

    public function destroy ()  
    {
        
    }

    public function show (Project $project)  
    {
        /** @var User $user */
        $user = Auth::user();

        // $project->load(['developers', 'client', 'task']);
        // dd($project);
        if($user->hasRole('admin')) {
            $developers_id = [];
            foreach($project->developers as $developer) {
                $developers_id[] = $developer->id;
            }
            $availableDevelopers = User::role('developpeur')->whereNotIn('id', $developers_id)->get();
            return view('admin.projects.show', ['project' => $project, 'availableDevelopers' => $availableDevelopers]);

        } elseif($user->hasRole('developpeur')) { 
            return view('developpeur.projects.show', ['project' => $project]);
        } elseif($user->hasRole('client')) { 
            return view('client.projects.show', ['project' => $project]);
        }
        return view('dashboard');
    }

    public function addDeveloper (Request $request, Project $project)  
    {
        // dd($project);
        $request->validate([
            'developer_id' => 'required|exists:users,id',
        ]);

        $project->developers()->attach($request->developer_id);

        return back()->with('success', 'Nouveau dévelopeur affecté  au projet');
    }

    public function removeDeveloper (Project $project, User $developer)  
    {
        $project->developers()->detach($developer->id);
        return back()->with('success', 'Dévelopeur ' . $developer->name . ' retiré du projet');
    }
}
