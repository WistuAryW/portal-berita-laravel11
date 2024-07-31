<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ArtikelController extends Controller
{
    public function show($id)
    {
        // Menggunakan eager loading untuk mengurangi jumlah query
        $post = Post::with(['comments', 'categorie.subCategories'])->findOrFail($id);
        $posts = Post::latest()->take(5)->get(); // Mengambil 5 post terbaru
        $categories = Categories::with('subCategories')->get();
        $trendingPosts = Post::orderBy('views', 'desc')->take(5)->get();
        $title = 'Berita terkini';
        $url = route('post.show', ['id' => $id]);

        // Tambahkan jumlah views
        $post->increment('views');

        return view('category.detail', compact('url', 'post', 'title', 'posts', 'trendingPosts', 'categories'));
    }

    public function share($id)
    {
        $post = Post::findOrFail($id);
        $url = route('post.show', ['id' => $id]);
        return view('category.detail', compact('post', 'url'));
    }

    public function storeComment(Request $request): RedirectResponse
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'message' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Comment posted successfully!');
    }
}
