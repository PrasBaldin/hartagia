@extends('admin.layouts.app')

@section('breadcrumb')
<li class="inline-flex items-center">
    <span class="mx-2 text-gray-500">/</span>
    <span class="text-gray-700">Layanan</span>
</li>
@endsection

@section('content')
<div class="p-8 bg-white rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-extrabold text-center tracking-tight">Daftar Layanan</h2>
        <a href="{{ route('admin.service.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white hover:text-gray-100 font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300">Tambah Layanan</a>
    </div>

    @include('components.alerts')

    @if($services->isEmpty())
    <p class="text-center text-gray-500 py-6">Data tidak ada</p>
    @else
    <table class="w-full border border-gray-200 rounded-lg border-separate border-spacing-0">
        <thead class="bg-gray-200 text-gray-700 border-b border-gray-200">
            <tr>
                <th class="px-2 py-4 w-[10px] border border-gray-300 rounded-tl-lg">No</th>
                <th class="px-2 py-4 w-[20%] border border-gray-300">Gambar</th>
                <th class="px-2 py-4 w-[50%] border border-gray-300">Nama Layanan</th>
                <th class="px-2 py-4 w-[20%] border border-gray-300">Deskripsi</th>
                <th class="px-2 py-4 w-[20%] border border-gray-300">Point</th>
                <th class="px-2 py-4 w-[10%] border border-gray-300 rounded-tr-lg">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $index => $service)
            <tr class="{{ $index % 2 === 0 ? 'bg-gray-100' : 'bg-white' }} hover:bg-gray-200 border-t border-gray-300">
                <td class="text-center border border-gray-300">{{ $index + 1 }}</td>
                <td class="border border-gray-300">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->image }}" class="w-full">
                    @else
                    Tidak ada gambar
                    @endif
                </td>
                <td class="border border-gray-300 p-4">{{ $service->service_name ? $service->service_name->translated_text : '-' }}</td>
                <td class="border border-gray-300 p-4">{{ $service->service_desc ? $service->service_desc->translated_text : '-' }}</td>
                <td class="border border-gray-300 p-4">
                    @php
                    $content = isset($service->service_content) ? $service->service_content->translated_text : '';
                    $lines = explode("\n", $content);
                    @endphp


                    <ul class="list-disc pl-5 space-y-1">
                        @foreach($lines as $line)
                        <li>{{ trim($line) }}</li>
                        @endforeach
                    </ul>
                </td>
                <td class="border border-gray-300 p-4">
                    <div class="flex flex-col gap-2">
                        <a href="#" class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300">
                            <i class="fas fa-eye"></i> Lihat
                        </a>

                        <a href="{{ route('admin.service.edit', $service->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form id="delete-form-{{ $service->id }}" action="{{ route('admin.service.delete', $service->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="button" class="w-full bg-red-500 hover:bg-red-700 text-white text-sm font-semibold py-2 px-4 rounded-lg flex items-center gap-2 transition duration-300" onclick="confirmDelete({{ $service->id }})">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
