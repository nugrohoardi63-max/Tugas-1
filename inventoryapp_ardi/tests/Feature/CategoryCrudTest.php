<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_displays_categories_list(): void
    {
        $category = Category::create([
            'name'        => 'Elektronik',
            'description' => 'Perangkat elektronik kantor dan rumah tangga.',
        ]);

        $response = $this->get('/category');

        $response->assertStatus(200);
        $response->assertSee('Daftar Kategori');
        $response->assertSee($category->name);
    }

    public function test_create_displays_form(): void
    {
        $response = $this->get('/category/create');

        $response->assertStatus(200);
        $response->assertSee('Tambah Kategori Baru');
    }

    public function test_store_creates_category_and_redirects(): void
    {
        $response = $this->post('/category', [
            'name'        => 'Alat Tulis',
            'description' => 'Kebutuhan alat tulis kantor sehari-hari.',
        ]);

        $response->assertRedirect('/category');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('categories', [
            'name'        => 'Alat Tulis',
            'description' => 'Kebutuhan alat tulis kantor sehari-hari.',
        ]);
    }

    public function test_store_validates_required_fields(): void
    {
        $response = $this->from('/category/create')->post('/category', [
            'name'        => '',
            'description' => '',
        ]);

        $response->assertRedirect('/category/create');
        $response->assertSessionHasErrors(['name', 'description']);
        $this->assertDatabaseCount('categories', 0);
    }

    public function test_show_displays_category_detail(): void
    {
        $category = Category::create([
            'name'        => 'Furniture',
            'description' => 'Meja, kursi, dan lemari penyimpanan.',
        ]);

        $response = $this->get("/category/{$category->id}");

        $response->assertStatus(200);
        $response->assertSee('Detail Kategori');
        $response->assertSee($category->name);
        $response->assertSee($category->description);
    }

    public function test_show_returns_404_when_category_not_found(): void
    {
        $response = $this->get('/category/99999');

        $response->assertStatus(404);
    }

    public function test_edit_displays_prefilled_form(): void
    {
        $category = Category::create([
            'name'        => 'Konsumsi',
            'description' => 'Makanan dan minuman pantry.',
        ]);

        $response = $this->get("/category/{$category->id}/edit");

        $response->assertStatus(200);
        $response->assertSee('Edit Kategori');
        $response->assertSee($category->name);
        $response->assertSee($category->description);
    }

    public function test_update_modifies_category_and_redirects(): void
    {
        $category = Category::create([
            'name'        => 'Nama Lama',
            'description' => 'Deskripsi lama.',
        ]);

        $response = $this->put("/category/{$category->id}", [
            'name'        => 'Nama Baru',
            'description' => 'Deskripsi terbaru.',
        ]);

        $response->assertRedirect('/category');
        $response->assertSessionHas('success');
        $this->assertDatabaseHas('categories', [
            'id'          => $category->id,
            'name'        => 'Nama Baru',
            'description' => 'Deskripsi terbaru.',
        ]);
    }

    public function test_destroy_deletes_category_and_redirects(): void
    {
        $category = Category::create([
            'name'        => 'Akan Dihapus',
            'description' => 'Kategori sementara untuk pengujian hapus.',
        ]);

        $response = $this->delete("/category/{$category->id}");

        $response->assertRedirect('/category');
        $response->assertSessionHas('success');
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
        ]);
    }
}
