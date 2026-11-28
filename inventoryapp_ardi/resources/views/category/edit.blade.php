@extends('layouts.app')

@section('title', 'Edit Kategori - Inventory App')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 class="card-title">Edit Kategori</h1>
                <p class="card-subtitle">Perbarui informasi untuk kategori <strong>{{ $category->name }}</strong>.</p>
            </div>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">&larr; Kembali</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Terjadi kesalahan validasi:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nama Kategori <span class="required">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name', $category->name) }}"
                    placeholder="Masukkan nama kategori"
                    class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    required
                >
                @error('name')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Deskripsi <span class="required">*</span></label>
                <textarea
                    id="description"
                    name="description"
                    placeholder="Masukkan deskripsi kategori"
                    class="{{ $errors->has('description') ? 'is-invalid' : '' }}"
                    required
                >{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="{{ route('category.show', $category->id) }}" class="btn btn-info">Lihat Detail</a>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
