@extends('layouts.app')
@section('content')
    @include('components.pageBanner', ['current' => __('menu.contact')])
    <section>
        <div class="container">
            <div class="flex items-center justify-between flex-col md:flex-row gap-10 py-20">
                <!-- Contact Form -->
                <div class="mb-6 md:mb-0 max-w-full w-[400px]">
                    <form class="bg-white rounded-lg shadow-md p-10 space-y-4" @aos('fade-right', 200)>
                        <h3 class="uppercase tracking-widest text-green-700 mb-10">
                            {{ __('contact.form.title') }}
                        </h3>
                        <div class="flex items-center mb-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-green-700 text-white rounded-full mr-3">
                                <i class="fas fa-user"></i>
                            </span>
                            <label for="name" class="block text-gray-700 font-semibold">
                                {{ __('contact.form.name') }}
                            </label>
                        </div>
                        <input type="text" id="name" name="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-700" required>

                        <div class="flex items-center mb-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-green-700 text-white rounded-full mr-3">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <label for="email" class="block text-gray-700 font-semibold">
                                {{ __('contact.form.email') }}
                            </label>
                        </div>
                        <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-700" required>

                        <div class="flex items-center mb-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-green-700 text-white rounded-full mr-3">
                                <i class="fas fa-comment-dots"></i>
                            </span>
                            <label for="message" class="block text-gray-700 font-semibold">
                                {{ __('contact.form.message') }}
                            </label>
                        </div>
                        <textarea id="message" name="message" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-700" required></textarea>

                        <button type="submit" class="w-full bg-gradient-to-r from-green-700 to-green-500 text-white font-semibold py-2 rounded hover:from-green-800 hover:to-green-600 transition flex items-center justify-center gap-2">
                            <i class="fas fa-paper-plane"></i>
                            {{ __('contact.form.send') }}
                        </button>
                    </form>
                </div>
                <!-- Contact Info -->
                <div class="md:w-1/2">
                    <div class="mb-6">
                        <h2 class="uppercase tracking-widest text-green-700 mb-2">
                            {{ __('contact.title') }}
                        </h2>
                        <h2 class="text-2xl md:text-4xl font-semibold mb-4">
                            {{ __('contact.subtitle') }}
                        </h2>
                    </div>
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-green-700 text-white rounded-full">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <span class="text-lg">
                                {{ $contact->contact_email ? $contact->contact_email : '-' }}
                            </span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-green-700 text-white rounded-full">
                                <i class="fas fa-phone-alt"></i>
                            </span>
                            <span class="text-lg">
                                {{ $contact->contact_phone ? $contact->contact_phone : '-' }}
                            </span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <span class="inline-flex items-center justify-center w-10 h-10 bg-green-700 text-white rounded-full mt-1 flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <span class="text-lg break-words max-w-xs">
                                {{ $contact->office_address ? $contact->office_address : '-' }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-10">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1179.1158480338775!2d106.86605637174597!3d-6.256200682272392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sid!4v1749802117070!5m2!1sen!2sid" width="100%" height="200" style="border:0; border-radius: 1rem;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
