<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $categorieId = $request->input('categorie_id');
        $query = Post::with(['categorie', 'comments'])->latest();

        if ($categorieId) {
            $query->where('categorie_id', $categorieId);
        }

        $posts = $query->withCount('comments')->paginate(5);
        $categories = Categories::all();

        return view('dashboard.post.index', compact('posts', 'categories'));
    }

    public function show()
    {
        $posts = Post::with(['categorie', 'comments'])->get();
        return view('home.artikel', compact('posts'));
    }

    public function detail($id): View
    {
        $post = Post::with(['categorie', 'subCategorie', 'comments'])->findOrFail($id);
        return view('home.detail', compact('post'));
    }

    public function create(): View
    {
        $categories = Categories::with('subCategories')->get();
        $subCategories = SubCategory::all();
        return view('dashboard.post.create', compact('categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'texts' => 'required',
            'comment' => 'nullable',
            'thumbnail' => 'nullable|image|max:2048',
            'categorie_id' => 'required|exists:categories,id',
            'sub_categorie_id' => 'nullable|exists:sub_categories,id',
        ]);

        $post = new Post;
        $post->user_id = Auth::id();
        $post->content = $request->texts;
        $post->fill($validatedData);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $filename = time() . '_' . $thumbnail->getClientOriginalName();
            $path = $thumbnail->storeAs('public/thumbnails', $filename);
            $post->thumbnail = $path;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    public function edit($id): View
    {
        $post = Post::findOrFail($id);
        $categories = Categories::with('subCategories')->get();
        $subCategories = SubCategory::all();
        return view('dashboard.post.edit', compact('post', 'categories', 'subCategories'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'texts' => 'required',
            'comment' => 'nullable',
            'editor_choice' => 'boolean',
            'thumbnail' => 'nullable|image|max:2048',
            'categorie_id' => 'required|exists:categories,id',
            'sub_categorie_id' => 'nullable|exists:sub_categories,id',
        ]);

        $post = Post::findOrFail($id);
        $post->user_id = Auth::id();
        $post->content = $request->texts;
        $post->fill($validatedData);

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail) {
                Storage::delete($post->thumbnail);
            }

            $thumbnail = $request->file('thumbnail');
            $filename = time() . '_' . $thumbnail->getClientOriginalName();
            $path = $thumbnail->storeAs('public/thumbnails', $filename);
            $post->thumbnail = $path;
        }

        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post->thumbnail) {
            Storage::delete($post->thumbnail);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }
}
