@extends('admin.layouts.app')

@section('content')
@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">Portfolio</span>
</li>
@endsection

<div class="p-8 mt-6 bg-white rounded-lg shadow-md">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Portfolio</h2>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Tambah Portfolio</a>
    </div>
    @if(session('success'))
    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 rounded-xl shadow">
        <strong>Berhasil!</strong> {{ session('success') }}
    </div>
    @endif

    @if(session('warning'))
    <div class="mb-6 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 rounded-xl shadow">
        <strong>Peringatan!</strong> {{ session('warning') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="mb-6 p-4 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-xl shadow">
        <strong>Kesalahan!</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
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
                    <img src="{{ asset('storage/' . $portfolio->image_1) }}" alt="{{ $portfolio->image_1 }}" width="100">
                    @else
                    Tidak ada gambar
                    @endif
                </td>
                <td>{{ $portfolio->project_name ? $portfolio->project_name->translated_text : '-' }}</td>
                <td>{{ $portfolio->project_desc ? $portfolio->project_desc->translated_text : '-' }}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-primary">view</a>
                    <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form id="delete-form-{{ $portfolio->id }}" action="{{ route('admin.portfolio.delete', $portfolio->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $portfolio->id }})">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
