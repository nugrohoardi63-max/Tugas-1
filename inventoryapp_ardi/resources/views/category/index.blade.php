@extends('layouts.app')

@section('title', 'Daftar Kategori - Inventory App')

@section('content')
    <div class="card">
        <div class="card-header">
            <div>
                <h1 class="card-title">
                    Daftar Kategori
                    <span class="badge">{{ $categories->count() }} data</span>
                </h1>
                <p class="card-subtitle">Kelola data kategori barang untuk aplikasi inventaris.</p>
            </div>
            <a href="{{ route('category.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($categories->isEmpty())
            <div class="empty-state">
                <div class="icon">📂</div>
                <p>Belum ada data kategori. Silakan tambahkan kategori pertama Anda.</p>
                <a href="{{ route('category.create') }}" class="btn btn-primary">+ Tambah Kategori</a>
            </div>
        @else
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 60px;">No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th style="width: 170px;">Dibuat Pada</th>
                            <th style="width: 230px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $index => $category)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $category->name }}</strong></td>
                                <td>{{ \Illuminate\Support\Str::limit($category->description, 90) }}</td>
                                <td>{{ $category->created_at?->format('d M Y H:i') ?? '-' }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori \'{{ addslashes($category->name) }}\'?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
