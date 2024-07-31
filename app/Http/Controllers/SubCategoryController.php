<?php
namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    // Menampilkan daftar subkategori
    public function index(): View
    {
        // Menggunakan eager loading untuk mengurangi jumlah query
        $subCategories = SubCategory::with('category')->paginate(5);
        return view('dashboard.sub_categorie.index', compact('subCategories'));
    }

    // Menampilkan form untuk membuat subkategori baru
    public function create(): View
    {
        $categories = Categories::all();
        return view('dashboard.sub_categorie.create', compact('categories'));
    }

    // Menyimpan subkategori baru ke database
    public function store(Request $request): RedirectResponse
    {
        // Validasi input yang lebih ketat
        $request->validate([
            'name' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        SubCategory::create($request->only(['name', 'categorie_id']));

        return redirect()->route('subcategorie.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit subkategori
    public function edit($id): View
    {
        $categories = Categories::all();
        $subCategorie = SubCategory::findOrFail($id);
        return view('dashboard.sub_categorie.edit', compact('subCategorie', 'categories'));
    }

    // Memperbarui subkategori di database
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi input yang lebih ketat
        $request->validate([
            'name' => 'required|string|max:255',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $subCategorie = SubCategory::findOrFail($id);
        $subCategorie->update($request->only(['name', 'categorie_id']));

        return redirect()->route('subcategorie.index')->with('success', 'Data berhasil diedit!');
    }

    // Menghapus subkategori dari database
    public function destroy($id): RedirectResponse
    {
        $subCategorie = SubCategory::findOrFail($id);
        $subCategorie->delete();
        return redirect()->route('subcategorie.index')->with('success', 'Data berhasil dihapus!');
    }
}
