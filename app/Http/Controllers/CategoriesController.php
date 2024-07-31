<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    // Menampilkan daftar kategori dengan paginasi
    public function index(): View
    {
        $categories = Categories::paginate(5);
        return view('dashboard.categorie.index', compact('categories'));
    }

    // Menampilkan form untuk membuat kategori baru
    public function create(): View
    {
        return view('dashboard.categorie.create');
    }

    // Menyimpan kategori baru ke database
    public function store(Request $request): RedirectResponse
    {
        // Validasi input yang lebih ketat
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Categories::create($request->only('name'));

        return redirect()->route('categories.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit kategori
    public function edit($id): View
    {
        $categories = Categories::findOrFail($id);
        return view('dashboard.categorie.edit', compact('categories'));
    }

    // Memperbarui kategori di database
    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi input yang lebih ketat
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Categories::findOrFail($id);
        $category->update($request->only('name'));

        return redirect()->route('categories.index')->with('success', 'Data berhasil diedit!');
    }

    // Menghapus kategori dari database
    public function destroy($id): RedirectResponse
    {
        $category = Categories::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Data berhasil dihapus!');
    }
}
