@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Portfolio</h2>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Tambah Portfolio</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Proyek</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $index => $portfolio)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($portfolio->image_1)
                    <img src="{{ asset('storage/portfolio_images/' . $portfolio->image_1) }}" alt="{{ $portfolio->image_1 }}" width="100">
                    @else
                    Tidak ada gambar
                    @endif
                </td>
                <td>{{ $project_name ? $project_name->translated_text : '-' }}</td>
                <td>{{ $project_desc ? $project_desc->translated_text : '-' }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">view</a>
                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.portfolio.delete', $portfolio->id) }}" method="POST" style="display:inline;">
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
