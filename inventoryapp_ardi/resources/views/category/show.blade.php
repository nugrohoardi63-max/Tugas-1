@extends('layouts.app')

@section('title', 'Detail Kategori - Inventory App')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 class="card-title">Detail Kategori</h1>
                <p class="card-subtitle">Informasi lengkap mengenai kategori yang dipilih.</p>
            </div>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">&larr; Kembali ke Daftar</a>
        </div>

        <div class="detail-grid">
            <div class="detail-item">
                <div class="detail-label">ID Kategori</div>
                <div class="detail-value">#{{ $category->id }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Nama Kategori</div>
                <div class="detail-value"><strong>{{ $category->name }}</strong></div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Deskripsi</div>
                <div class="detail-value">{!! nl2br(e($category->description)) !!}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Dibuat Pada</div>
                <div class="detail-value">{{ $category->created_at?->format('d M Y, H:i:s') ?? '-' }}</div>
            </div>

            <div class="detail-item">
                <div class="detail-label">Terakhir Diperbarui</div>
                <div class="detail-value">{{ $category->updated_at?->format('d M Y, H:i:s') ?? '-' }}</div>
            </div>
        </div>

        <div class="form-actions">
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning">Edit Kategori</a>
            <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori \'{{ addslashes($category->name) }}\'?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus Kategori</button>
            </form>
            <a href="{{ route('category.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
@endsection
