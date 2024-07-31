<?php

use App\Http\Controllers\{
    ArtikelController,
    CategoriesController,
    HomeController,
    PostController,
    ProfileController,
    SubCategoryController,
    UserController
};
use App\Models\{
    Categories,
    Post,
    SubCategory
};
use Illuminate\Support\Facades\Route;

// Dashboard route
// Route::get('/dashboard', function () {
//     return view('dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Comment route
    Route::post('/comments/store', [ArtikelController::class, 'storeComment'])->name('comment.store');
});

// User routes
Route::middleware('auth', 'admin')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/user', [UserController::class, 'index']);
    Route::get('/edit-user-{id}', [UserController::class, 'edit']);
    Route::put('/user/update/{id}', [UserController::class, 'update']);
    Route::delete('/user/destroy/{id}', [UserController::class, 'destroy']);

    // Post routes
    Route::get('/post', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create-post', [PostController::class, 'create']);
    Route::post('/post/store', [PostController::class, 'store'])->name('posts.create');
    Route::get('/edit-post-{id}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/post/update/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/post/destroy/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

    // Category routes
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories.index');
    Route::get('/create-categories', [CategoriesController::class, 'create']);
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('categories.create');
    Route::get('/edit-categories-{id}', [CategoriesController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])->name('categories.update');
    Route::delete('/categories/destroy/{id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');

    // SubCategory routes
    Route::get('/subcategorie', [SubCategoryController::class, 'index'])->name('subcategorie.index');
    Route::get('/create-subcategorie', [SubCategoryController::class, 'create']);
    Route::post('/subcategorie/store', [SubCategoryController::class, 'store'])->name('subcategorie.create');
    Route::get('/edit-subcategorie-{id}', [SubCategoryController::class, 'edit'])->name('subcategorie.edit');
    Route::put('/subcategorie/update/{id}', [SubCategoryController::class, 'update'])->name('subcategorie.update');
    Route::delete('/subcategorie/destroy/{id}', [SubCategoryController::class, 'destroy'])->name('subcategorie.destroy');
});

// Home route
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
});




$categories = Categories::with('subCategories')->get();

foreach ($categories as $category) {
    $categoryName = strtolower(str_replace(' ', '', $category->name));
    $categoryBody = strtolower($category->name);

    Route::get("/{$categoryName}", function () use ($categoryName, $categoryBody) {
        $categories = Categories::with('subCategories')->get();
        $trendingPosts = Post::orderBy('views', 'desc')->take(5)->get();
        $posts = Post::whereHas('categorie', function ($query) use ($categoryBody) {
            $query->where('name', $categoryBody);
        })->paginate(15);
        $postsall = Post::paginate(5);
        $name = $categoryBody;
        $title = 'Berita terkini ' . $categoryName;
        return view('category.index', compact('name', 'title', 'categoryName', 'posts', 'trendingPosts', 'categories', 'postsall'));
    })->name("category.{$categoryName}");

    if ($category->subCategories->isNotEmpty()) {
        foreach ($category->subCategories as $subCategory) {
            $subCategoryName = strtolower(str_replace(' ', '', $subCategory->name));
            $subCategoryBody = strtolower($subCategory->name);

            Route::get("/{$categoryName}-{$subCategoryName}", function () use ($categoryName, $subCategoryName, $subCategoryBody) {
                $categories = Categories::with('subCategories')->get();
                $trendingPosts = Post::orderBy('views', 'desc')->take(5)->get();
                $posts = Post::whereHas('subCategorie', function ($query) use ($subCategoryBody) {
                    $query->where('name', $subCategoryBody);
                })->paginate(15);
                $postsall = Post::paginate(5);
                $name = $subCategoryBody;
                $title = $subCategoryName . ' | ' . $categoryName . ' - WAW News';
                return view('category.subcategory.index', compact('name', 'title', 'categoryName', 'subCategoryName', 'posts', 'trendingPosts', 'categories', 'postsall'));
            })->name("category.{$categoryName}.{$subCategoryName}");
        }
    }
}



// Category and Subcategory routes
Route::get('category-post-{id}', [ArtikelController::class, 'show'])->name('post.show');


require __DIR__ . '/auth.php';
