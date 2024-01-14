<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $newsItems = News::all();
        $newsItems = $newsItems->sortByDesc('created_at');

        return view('news.index', ['newsItems' => $newsItems]);
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable',
            'content' => 'nullable|string',
        ]);

        $newsItem = new News();

        $newsItem->title = $validatedData['title'];
        // Handle image upload and store cover image path
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('news_images', 'public');
            $newsItem->cover_image = $imagePath;
        }
        $newsItem->content = $validatedData['content'];

        $newsItem->save();

        return redirect('/news')->with('success', 'News item created successfully!');
    }

    public function edit($id)
    {
        $newsItem = News::findOrFail($id);

        return view('news.edit', ['newsItem' => $newsItem]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image',
            'content' => 'nullable|string',
        ]);

        $newsItem = News::findOrFail($id);

        $newsItem->title = $validatedData['title'];
        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('news_images', 'public');
            $newsItem->cover_image = $imagePath;
        }
        $newsItem->content = $validatedData['content'];

        $newsItem->save();

        return redirect('/news')->with('success', 'News item updated successfully!');
    }

    public function destroy($id)
    {
        $newsItem = News::findOrFail($id);
        $newsItem->delete();

        return redirect('/news')->with('success', 'News item deleted successfully!');
    }

    public function show($id)
    {
        $newsItem = News::findOrFail($id);

        return view('news.show', ['newsItem' => $newsItem]);
    }
}
