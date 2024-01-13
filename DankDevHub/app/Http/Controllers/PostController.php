<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;


class PostController extends Controller
{
    public function index(Category $category)
    {
        $posts = $category->posts;
        $users = $posts->pluck('user_id');
        for ($i = 0; $i < count($users); $i++) {
            $users[$i] = \App\Models\User::find($users[$i]);
        }

        return view('posts.index', compact('category', 'posts', 'users'));
    }

    public function create(Category $category)
    {
        return view('posts.create', compact('category'));
    }

    public function store(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = Auth::user();
        $validatedData['user_id'] = $user->id;


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('post_images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $category->posts()->create($validatedData);

        return redirect()->route('category.posts', ['category' => $category->id])
            ->with('success', 'Post created successfully!');
    }

    public function edit(Category $category, Post $post)
    {
        if (Auth::id() === $post->user_id || (auth()->user()->isAdmin())) {
            return view('posts.edit', compact('category', 'post'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function update(Request $request, Category $category, Post $post)
    {
        if (Auth::id() === $post->user_id || (auth()->user()->isAdmin())) {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'nullable|string',
                'image' => 'nullable',
            ]);

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('post_images', 'public');
                $validatedData['image'] = $imagePath;
            }

            $post->update($validatedData);

            return redirect()->route('category.posts', ['category' => $category->id])
                ->with('success', 'Post updated successfully!');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function destroy(Category $category, Post $post)
    {
        if (Auth::id() === $post->user_id || (auth()->user()->isAdmin())) {
            $post->delete();

            return redirect()->route('category.posts', ['category' => $category->id])
                ->with('success', 'Post deleted successfully!');
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function show(Category $category, Post $post)
    {
        $post->load('comments.user', 'comments.comments.user');
        return view('posts.show', compact('category', 'post'));
    }

    public function storeComment(Request $request,int $category, int $post = null, int $parentComment = null)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $user = Auth::user();

        $comment = new Comment([
            'content' => $validatedData['content'],
        ]);

        $comment->user()->associate($user);

        if ($parentComment == 0) {
            $post = Post::find($post);
            $post->comments()->save($comment);
        }
        else {
            $parentComment = Comment::find($parentComment);
            $parentComment->comments()->save($comment);
        } 

        return redirect()->back()->with('success', 'Comment created successfully!');
    }

    public function destroyComment (int $category, int $post, int $comment)
    {
        $comment = Comment::find($comment);
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }

    public function editComment (int $category, int $post, int $comment)
    {
        $comment = Comment::find($comment);
        return view('posts.edit-comment', compact('category', 'post', 'comment'));
    }

    public function updateComment (Request $request, int $category, int $post, int $comment)
    {
        $validatedData = $request->validate([
            'content' => 'required|string',
        ]);

        $comment = Comment::find($comment);
        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->route('category.posts', ['category' => $category, 'post' => $post])->with('success', 'Comment updated successfully!');
    }
}