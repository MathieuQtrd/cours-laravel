<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index () 
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function create () 
    {
        return view('categories.create');
    }

    public function store (Request $request) 
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:categories,name',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'   => 'required|string',
        ]);

        if($request->hasFile('image')) {
            $path = $request->file('image')->store('categories_img', 'public');
            // Il faudra exécuter la commande suivante pour permettre le lien symbolique entre stroage et public
            // php artisan storage:link
            $validated['image'] = $path;
        }

        Category::create($validated);

        return back()->with('success', 'Nouvelle catégorie enregistré');
        return redirect()->route('categories.index')->with('success', 'Nouvelle catégorie enregistré');
    }

    public function edit (Category $category) 
    {
        return view('categories.edit', ['category' => $category]);
    }

    public function update (Request $request, Category $category) 
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255|unique:categories,name,' . $category->id,
            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'description'   => 'required|string',
        ]);

        if($request->hasFile('image')) {
            if($category->image) {
                Storage::disk('public')->delete($category->image); // on supprime l'ancienne photo
            }
            $path = $request->file('image')->store('categories_img', 'public');
            $validated['image'] = $path;
        }

        $category->update($validated); // permet de recevoir un tableau array

        return redirect()->route('categories.index')->with('success', 'Modification effectuée');

    }

    public function destroy (Category $category) 
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée');
    }
}
