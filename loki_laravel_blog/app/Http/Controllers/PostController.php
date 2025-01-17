<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index () 
    {
        $posts = Post::with('category')->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create () 
    {
        $categories = Category::all();
        return view('posts.create', ['categories' => $categories]);
    }

    public function store (Request $request) 
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'author'        => 'required|string|max:255',
            'price'         => 'required|numeric',
            'event_date'    => 'required|date',
            'main_img'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'slug'          => 'required|string|max:255|unique:posts,slug',
            'content'       => 'required|string',
            'short_content' => 'required|string',
            'publish_date'  => 'required|date',
            'category_id'   => 'required|exists:categories,id',
        ]);

        if($request->hasFile('main_img')) {
            $path = $request->file('main_img')->store('posts_img', 'public');
            // Il faudra exécuter la commande suivante pour permettre le lien symbolique entre stroage et public
            // php artisan storage:link
            $validated['main_img'] = $path;
        }

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', 'Nouvel article enregistré');
    }

    public function edit (Post $post) 
    {
        $categories = Category::all();
        return view('posts.edit', ['post' => $post]);
    }

    public function update (Request $request, Post $post) 
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'author'        => 'required|string|max:255',
            'price'         => 'required|numeric',
            'event_date'    => 'required|date',
            'main_img'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'slug'          => 'required|string|max:255|unique:posts,slug,' . $post->id,
            'content'       => 'required|string',
            'short_content' => 'required|string',
            'publish_date'  => 'required|date',
            'category_id'   => 'required|exists:categories,id',
        ]);

        if($request->hasFile('main_img')) {
            if($post->main_img) {
                Storage::disk('public')->delete($post->main_img); // on supprime l'ancienne photo
            }
            $path = $request->file('main_img')->store('posts_img', 'public');
            $validated['main_img'] = $path;
        }

        $post->update($validated); // permet de recevoir un tableau array

        return redirect()->route('posts.index')->with('success', 'Modification effectuée');

    }

    public function destroy (Post $post) 
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Article supprimé');
    }
}
