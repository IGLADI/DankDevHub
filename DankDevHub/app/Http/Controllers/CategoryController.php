<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|max:2048',
        ]);
        $validatedData['user_id'] = Auth::id();

        $category = Category::create($validatedData);

        if ($request->image) {
            $image = $request->file('image');
            $imagePath = $image->store('category_images', 'public');
            $category->image = $imagePath;
            $category->save();
        }

        return redirect('/categories')->with('success', 'Category created successfully!');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/categories')->with('success', 'Category deleted successfully!');
    } 
}