<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $products->transform(function ($product) {
            if($product->image) {
                $product->image_url = url('storage/' . $product->image);
            }
            return $product;
        });
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif,webp|max:2048',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'color' => 'required|string|max:255',
            'size' => 'required|string|max:255',
        ]);

        if($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        } else {
            $imagePath = null;
        }

        $product = Product::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => $imagePath,
            'description' => $request->description,
            'stock' => $request->stock,
            'price' => $request->price,
            'color' => $request->color,
            'size' => $request->size,
        ]);

        return response()->json($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if(!$product) {
            return response()->json(['erreur' => 'Produit non trouvé'], 404);
        }
        if($product->image) {
            $product->image_url = url('storage/' . $product->image);
        }
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        if(!$product) {
            return response()->json(['erreur' => 'Produit non trouvé'], 404);
        }
        if($product->image) {
            $imagePath = 'public/' . $product->image;
            if(Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }
        }

        $product->delete();
        
        return response()->json(['message' => 'Produit supprimé']);
    }
}
