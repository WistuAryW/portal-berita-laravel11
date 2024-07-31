<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Post;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $trendingPosts = Post::orderBy('views', 'desc')->take(5)->get();
        $trendingPostsb = Post::orderBy('views', 'desc')->take(3)->get();
        $hotPosts = Post::latest()->take(10)->get();
        $categories = Categories::with('subCategories')->get();
        $title = 'Berita terkini dan terpercaya';

        // Mendapatkan artikel dengan jumlah komentar terbanyak
        $mostCommentedPosts = Post::withCount('comments')
            ->orderByDesc('comments_count')
            ->take(5)
            ->get();

        // Mendapatkan artikel pilihan editor
        $editorChoices = Post::where('editor_choice', true)->take(6)->get();

        // Mendapatkan artikel berdasarkan kategori
        $politikPosts = $this->getPostsByCategory('Politik', 4);
        $hukumPosts = $this->getPostsByCategory('Hukum', 4);
        $ekonomiPosts = $this->getPostsByCategory('Ekonomi', 4);
        $metroPosts = $this->getPostsByCategory('Metro', 4);
        $humaniPosts = $this->getPostsByCategory('Humaniora', 4);
        $olaragaPosts = $this->getPostsByCategory('Olaraga', 4);

        $pilihanPosts = Post::orderBy('views', 'desc')->take(2)->get();

        return view('home.index', compact(
            'title',
            'trendingPosts',
            'trendingPostsb',
            'hotPosts',
            'politikPosts',
            'hukumPosts',
            'olaragaPosts',
            'pilihanPosts',
            'categories',
            'ekonomiPosts',
            'metroPosts',
            'humaniPosts',
            'editorChoices',
            'mostCommentedPosts'
        ));
    }

    private function getPostsByCategory($categoryName, $limit)
    {
        return Post::whereHas('categorie', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        })->latest()->take($limit)->get();
    }

    public function dashboard()
    {
        $post = Post::count();
        $categories = Categories::count();
        $subCategorie = SubCategory::count();
        $user = User::count(); 
        return view('dashboard.dashboard' , compact('user', 'post', 'categories', 'subCategorie'));
    }
}
