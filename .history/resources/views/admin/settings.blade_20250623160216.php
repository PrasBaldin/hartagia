@extends('admin.layouts.app')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <span class="mx-2 text-gray-500">/</span>
        <span class="text-gray-700">Pengaturan</span>
    </li>
@endsection

@section('content')
    <div class="p-8 mt-6 bg-white rounded-lg shadow-md space-y-8">

        <!-- General Website Information -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Informasi Umum Website</h2>
            <form>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Nama Situs</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Nama Situs">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Deskripsi Singkat</label>
                    <textarea class="w-full border rounded px-3 py-2" rows="2" placeholder="Deskripsi singkat"></textarea>
                </div>
                <div class="mb-4 flex items-center space-x-6">
                    <div>
                        <label class="block mb-1 font-medium">Logo</label>
                        <input type="file" class="block">
                    </div>
                    <div>
                        <label class="block mb-1 font-medium">Favicon</label>
                        <input type="file" class="block">
                    </div>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Bahasa Utama</label>
                    <select class="w-full border rounded px-3 py-2">
                        <option>Indonesia</option>
                        <option>English</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Logo Partner</label>
                    <input type="file" multiple class="block">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </form>
        </div>

        <!-- Contact & Social Media -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Kontak & Media Sosial</h2>
            <form>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Email Kontak</label>
                    <input type="email" class="w-full border rounded px-3 py-2" placeholder="Email Kontak">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Alamat Fisik</label>
                    <input type="text" class="w-full border rounded px-3 py-2" placeholder="Alamat Fisik">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Facebook</label>
                    <input type="url" class="w-full border rounded px-3 py-2" placeholder="Link Facebook">
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Instagram</label>
                    <input type="url" class="w-full border rounded px-3 py-2" placeholder="Link Instagram">
                </div>
                <!-- Add more social media as needed -->
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </form>
        </div>

        <!-- Admin Settings -->
        <div>
            <h2 class="text-lg font-semibold mb-4">Pengaturan Admin</h2>
            <form>
                <div class="mb-4">
                    <label class="block mb-1 font-medium">Ganti Password</label>
                    <input type="password" class="w-full border rounded px-3 py-2" placeholder="Password Baru">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
            </form>
        </div>

    </div>
@endsection
