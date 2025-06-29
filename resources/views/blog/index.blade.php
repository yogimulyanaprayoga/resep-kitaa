@extends('layouts.app')

@section('content')
  <section class="bg-white py-20">
    <div class="wrapper flex flex-col items-center gap-8 md:flex-row md:gap-16">

      <!-- Kiri: Teks -->
      <div class="sr-item text-center md:w-1/2 md:text-left">
        <h2 class="mb-4 text-4xl font-bold text-[#374552]">Temukan Cerita & Tips Masak Favoritmu</h2>
        <p class="mb-6 text-lg text-gray-600">
          Jelajahi inspirasi dapur, rahasia resep tradisional, dan panduan praktis dari tim kami untuk memasak lebih
          menyenangkan setiap hari.
        </p>
        <a href="#"
          class="inline-block rounded-full bg-[#374552] px-6 py-3 font-semibold text-white transition hover:bg-[#2b3947]">
          Jelajahi Artikel
        </a>
      </div>

      <!-- Kanan: Gambar -->
      <div class="sr-item md:w-1/2">
        <img src="{{ asset('images/blog-hero.png') }}" alt="Gambar Blog"
          class="h-auto w-full rounded-lg object-cover shadow-md">
      </div>

    </div>
  </section>

  <section class="bg-[#fdf7f9] py-16">
    <div class="wrapper">
      <div class="sr-item mb-10 flex flex-col items-center gap-4 md:flex-row md:justify-between">
        <h2 class="text-3xl font-bold text-[#374552]">Artikel Terbaru</h2>
      </div>

      <div class="grid gap-4 md:grid-cols-2">
        <div class="sr-item">
          @foreach ($posts as $post)
            <a href="{{ route('web.blog.show', $post->slug) }}" class="block transition duration-200 hover:opacity-80">
              <div>
                @if ($post->image)
                  <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                    class="rounded-4xl h-64 w-full object-cover">
                @else
                  <img src="{{ asset('images/placeholder.jpg') }}" alt="No image"
                    class="rounded-4xl h-64 w-full object-cover">
                @endif

                <div class="mt-4 flex items-center gap-4 text-sm text-gray-500">
                  <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#374552]" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M5.121 17.804A10.97 10.97 0 0112 15c2.24 0 4.308.655 6.003 1.779M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>{{ $post->author->name ?? 'Unknown Author' }}</span>
                  </div>

                  <div class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#374552]" fill="none"
                      viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ $post->read_time }}</span>
                  </div>
                </div>

                <h3 class="mt-2 text-xl font-bold text-[#374552]">{{ $post->title }}</h3>
                <p class="mb-4 mt-2 text-gray-600">{{ Str::limit($post->short_description, 100) }}</p>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      //   Scroll reveal
      ScrollReveal().reveal('.sr-fade-up', {
        reset: false,
        distance: '50px',
        duration: 1000,
        delay: 100,
        easing: 'ease-in-out',
        origin: 'bottom',
        viewOffset: {
          top: 100,
          right: 0,
          bottom: 0,
          left: 0
        }
      });

      ScrollReveal().reveal('.sr-item', {
        distance: '30px',
        origin: 'bottom',
        duration: 1000,
        delay: 100,
        interval: 500
      });
    });
  </script>
@endsection
