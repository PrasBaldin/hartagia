@extends('admin.layouts.app')

@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">Portofolio</span>
</li>
@endsection

@section('content')
<div class="p-8 mt-6 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-8">
        <h2>Daftar Portfolio</h2>
        <a href="{{ route('admin.portfolio.create') }}" class="btn btn-primary">Tambah Portfolio</a>
    </div>

    @include('components.alerts')

    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="w-[10px]">No</th>
                <th class="w-[20%]">Gambar</th>
                <th class="w-[50%]">Nama Proyek</th>
                <th class="w-[15%]">Deskripsi</th>
                <th class="w-[15%]">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($portfolios as $index => $portfolio)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @if($portfolio->image_1)
                    <img src="{{ asset('storage/' . $portfolio->image_1) }}" alt="{{ $portfolio->image_1 }}" class="w-full">
                    @else
                    Tidak ada gambar
                    @endif
                </td>
                <td>{{ $portfolio->project_name ? $portfolio->project_name->translated_text : '-' }}</td>
                <td>{{ $portfolio->project_desc ? $portfolio->project_desc->translated_text : '-' }}</td>
                <td>
                    <div class="flex flex-col gap-2">
                        <a href="#" class="btn btn-sm btn-primary">
                            <i class="fas fa-eye"></i> Lihat
                        </a>
                        <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form id="delete-form-{{ $portfolio->id }}" action="{{ route('admin.portfolio.delete', $portfolio->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete({{ $portfolio->id }})">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
