@extends('layouts.app')

@section('title', 'Tambah Kategori - Inventory App')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 class="card-title">Tambah Kategori Baru</h1>
                <p class="card-subtitle">Isi formulir di bawah ini untuk menambahkan data kategori baru.</p>
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

        <form action="{{ route('category.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Nama Kategori <span class="required">*</span></label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Elektronik, Alat Tulis, Makanan"
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
                    placeholder="Tuliskan deskripsi singkat mengenai kategori ini..."
                    class="{{ $errors->has('description') ? 'is-invalid' : '' }}"
                    required
                >{{ old('description') }}</textarea>
                @error('description')
                    <div class="field-error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Simpan Kategori</button>
                <a href="{{ route('category.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
@endsection
