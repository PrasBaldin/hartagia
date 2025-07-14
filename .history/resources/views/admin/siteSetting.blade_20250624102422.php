@extends('admin.layouts.app')

@section('breadcrumb')
    <li class="inline-flex items-center">
        <span class="mx-2 text-gray-500">/</span>
        <span class="text-gray-700">Pengaturan</span>
    </li>
@endsection

@section('content')
    @include('components.alerts')
    <div class="p-8 mt-6 bg-white rounded-lg shadow-md space-y-8">

        <!-- General Website Information -->
        <div x-data="{ open: true }" class="border rounded mb-4">
            <button type="button" @click="open = !open" class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-t focus:outline-none">
                <span class="text-lg font-semibold">Informasi Umum Website</span>
                <svg :class="{ 'transform rotate-180': open }" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="px-6 py-4" x-transition>
                <form method="POST" action="{{ route('setting.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Nama Situs</label>
                        <input type="text" name="site_name" class="w-full border rounded px-3 py-2" value="{{ $setting->site_name }}">
                    </div>

                    {{-- Primary language --}}
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Bahasa Utama</label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="primary_language" value="id" {{ $setting->primary_language == 'id' ? 'checked' : '' }}>
                            <span>Bahasa Indonesia</span>
                        </label>
                        <label class="flex items-center space-x-2">
                            <input type="radio" name="primary_language" value="en" {{ $setting->primary_language == 'en' ? 'checked' : '' }}>
                            <span>English</span>
                        </label>
                    </div>

                    <div class="mb-4 flex items-center space-x-6">
                        <div>
                            <label class="block mb-1 font-medium">Logo</label>
                            <input type="file" name="logo">
                            @if ($setting->logo)
                                <img src="{{ asset($setting->logo) }}" class="mt-2 w-24">
                            @endif
                        </div>
                        <div>
                            <label class="block mb-1 font-medium">Favicon</label>
                            <input type="file" name="favicon">
                            @if ($setting->favicon)
                                <img src="{{ asset($setting->favicon) }}" class="mt-2 w-8">
                            @endif
                        </div>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>

                </form>
            </div>
        </div>

        <!-- Contact & Social Media -->
        <div x-data="{ open: false }" class="border rounded mb-4">
            <button type="button" @click="open = !open" class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-t focus:outline-none">
                <span class="text-lg font-semibold">Kontak & Media Sosial</span>
                <svg :class="{ 'transform rotate-180': open }" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="px-6 py-4" x-transition>
                <form method="POST" action="{{ route('setting.update.contact') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <label for="email" class="block mb-1 font-medium">Email Kontak</label>
                        <input type="email" name="email" class="w-full border rounded px-3 py-2" placeholder="Email Kontak" value="{{ $setting->contact_email }}">
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block mb-1 font-medium">Alamat Kantor</label>
                        <input type="text" name="address" class="w-full border rounded px-3 py-2" placeholder="Alamat Kantor" value="{{ $setting->office_address }}">
                    </div>
                    <div class="mb-4">
                        <label for="facebook" class="block mb-1 font-medium">Facebook</label>
                        <input type="url" name="facebook" class="w-full border rounded px-3 py-2" placeholder="Link Facebook" value="{{ $setting->facebook_link }}">
                    </div>
                    <div class="mb-4">
                        <label for="instagram" class="block mb-1 font-medium">Instagram</label>
                        <input type="url" name="instagram" class="w-full border rounded px-3 py-2" placeholder="Link Instagram" value="{{ $setting->instagram_link }}">
                    </div>
                    <div class="mb-4">
                        <label for="tiktok" class="block mb-1 font-medium">Tiktok</label>
                        <input type="url" name="tiktok" class="w-full border rounded px-3 py-2" placeholder="Link Twitter" value="{{ $setting->tiktok_link }}">
                    </div>
                    <!-- Add more social media as needed -->
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Admin Settings -->
        <div x-data="{ open: false }" class="border rounded mb-4">
            <button type="button" @click="open = !open" class="w-full flex justify-between items-center px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-t focus:outline-none">
                <span class="text-lg font-semibold">Pengaturan Admin</span>
                <svg :class="{ 'transform rotate-180': open }" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="open" class="px-6 py-4" x-transition>
                <form method="POST" action="{{ route('setting.update.password') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-4">
                        <label for="current_password" class="block mb-1 font-medium">Password Sekarang</label>
                        <input type="password" name="current_password" class="w-full border rounded px-3 py-2" placeholder="Password Sekarang">
                    </div>
                    <div class="mb-4">
                        <label for="new_password" class="block mb-1 font-medium">Ganti Password</label>
                        <input type="password" name="new_password" class="w-full border rounded px-3 py-2" placeholder="Password Baru">
                    </div>
                    <div class="mb-4">
                        <label for="new_password_confirmation" class="block mb-1 font-medium">Konfirmasi Password</label>
                        <input type="password" name="new_password_confirmation" class="w-full border rounded px-3 py-2" placeholder="Konfirmasi Password">
                    </div>
                    <div class="mb-4">
                        <label class="block mb-1 font-medium">Terakhir Diupdate</label>
                        <input type="text" class="w-full border rounded px-3 py-2" value="{{ $users->updated_at ? $users->updated_at->format('d M Y H:i') : 'Belum ada update' }}" disabled>
                    </div>

                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Alpine.js CDN (add this before </body> if not already included) -->
        @push('scripts')
            <script src="//unpkg.com/alpinejs" defer></script>
        @endpush

    </div>
@endsection
