<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar semua data Category.
     */
    public function index()
    {
        $categories = Category::latest()->get();

        return view('category.index', compact('categories'));
    }

    /**
     * Menampilkan form untuk membuat data Category baru.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Menyimpan data Category baru ke tabel categories.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'name.required'        => 'Nama kategori wajib diisi.',
            'name.max'             => 'Nama kategori maksimal 255 karakter.',
            'description.required' => 'Deskripsi kategori wajib diisi.',
        ]);

        Category::create($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail data Category berdasarkan id.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);

        return view('category.show', compact('category'));
    }

    /**
     * Menampilkan form edit untuk data Category berdasarkan id.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Menyimpan perubahan data Category berdasarkan id.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
        ], [
            'name.required'        => 'Nama kategori wajib diisi.',
            'name.max'             => 'Nama kategori maksimal 255 karakter.',
            'description.required' => 'Deskripsi kategori wajib diisi.',
        ]);

        $category->update($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus data Category berdasarkan id.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()
            ->route('category.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
