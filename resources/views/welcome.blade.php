@extends('layouts.app')
{{-- #374552 --}}
@section('content')
  <section class="sr-fade-up">
    <div class="wrapper py-[120px]">
      @if ($carousels->count())
        <div id="gallery-carousel" class="splide mx-auto">
          <div class="splide__track">
            <ul class="splide__list">
              @foreach ($carousels as $carousel)
                <li class="splide__slide relative">
                  <!-- Gambar Desktop -->
                  <img src="{{ asset('storage/' . $carousel->image_desktop) }}" alt="Carousel Desktop"
                    class="hidden h-[500px] w-full rounded-xl object-cover shadow md:block">

                  <!-- Gambar Mobile -->
                  <img src="{{ asset('storage/' . $carousel->image_mobile) }}" alt="Carousel Mobile"
                    class="block h-[300px] w-full rounded-xl object-cover shadow md:hidden">
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      @else
        <p class="mt-4 text-center text-gray-500">Belum ada carousel tersedia.</p>
      @endif
    </div>
  </section>

  <section class="sr-fade-up relative overflow-visible py-20">
    <!-- Dekorasi kiri atas -->
    <img src="{{ asset('images/elements/pizza.png') }}" alt="Decoration Top Left"
      class="pointer-events-none absolute left-10 top-10 z-20 w-16 opacity-50 md:w-20 lg:w-28" />

    <!-- Dekorasi kanan bawah -->
    <img src="{{ asset('images/elements/shawarma.png') }}" alt="Decoration Bottom Right"
      class="pointer-events-none absolute bottom-10 right-10 z-20 w-16 opacity-50 md:w-20 lg:w-28" />

    <!-- Konten utama (dengan border rounded) -->
    <div class="wrapper relative z-10 overflow-hidden rounded-3xl bg-gradient-to-br from-sky-400 to-sky-200">
      <div class="mx-auto flex flex-col items-center justify-between gap-12 py-16 md:flex-row">
        <!-- Gambar kiri -->
        <div class="sr-item w-full md:w-1/2">
          <img src="{{ asset('images/deteksi-makanan.jpg') }}" alt="Deteksi Makanan"
            class="mx-auto w-full max-w-md rounded-xl shadow-lg md:mx-0" />
        </div>

        <!-- Teks kanan -->
        <div class="sr-item w-full text-center md:w-1/2 md:text-left">
          <h2 class="mb-4 text-4xl font-bold text-[#374552] md:text-5xl">
            AI Detection Food
          </h2>
          <p class="mb-6 text-lg text-[#374552]">
            Cukup upload makanan, dan biarkan AI kami mengenalinya! Sistem ini akan mendeteksi jenis makanan
            dan menampilkan resepnya secara otomatis.
          </p>
          <a href="/recipes"
            class="inline-block rounded-full bg-[#374552] px-8 py-3 text-white transition hover:bg-[#2a3240]">
            Coba Deteksi Sekarang →
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="sr-fade-up">
    <div class="wrapper pt-[120px]">
      <h2 class="sr-item sr-item mb-6 inline-flex text-4xl font-bold text-[#374552] md:text-5xl lg:text-4xl xl:text-6xl">
        Recipes Food
      </h2>

      <div class="flex flex-col gap-8 md:flex-row" x-data="{ selected: '{{ $categories->first()->name ?? '' }}' }">
        <!-- Sidebar -->
        <div class="sr-item w-full space-y-4 md:w-1/4">
          @foreach ($categories as $category)
            <button
              class="rounded-4xl flex w-full items-center gap-4 border border-pink-300 px-4 py-2 text-[#374552] transition hover:bg-pink-100"
              :class="{ 'bg-[#374552] text-white hover:text-[#2b3947]': selected === '{{ $category->name }}' }"
              @click="selected = '{{ $category->name }}'">
              <span class="rounded-full bg-[#374552] p-2 transition"
                :class="{ 'bg-white': selected === '{{ $category->name }}' }">
                <img src="{{ asset('storage/' . $category->icon) }}" alt="{{ $category->name }}" class="w-5">
              </span>
              <span>{{ $category->name }}</span>
            </button>
          @endforeach
        </div>

        <!-- Middle Image Area -->
        <div class="sr-item relative grid h-[286px] w-full place-items-center md:w-2/4">
          @foreach ($categories as $category)
            <img x-show="selected === '{{ $category->name }}'" x-cloak
              x-transition:enter="transition-all duration-500 ease-out" x-transition:enter-start="opacity-0 scale-90"
              x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition-all duration-300 ease-in"
              x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
              src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
              class="absolute inset-0 mx-auto h-[286px] w-auto rounded-xl object-contain shadow-md">
          @endforeach
        </div>

        <!-- Right Content Area -->
        <div class="sr-item max-h-[286px] w-full overflow-y-auto pr-2 md:w-2/4">
          @foreach ($categories as $category)
            <div x-show="selected === '{{ $category->name }}'" x-transition:enter="transition-all duration-500 ease-out"
              x-transition:enter-start="opacity-0 translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
              x-transition:leave="transition-all duration-400 ease-in"
              x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 translate-y-10"
              class="flex flex-col gap-y-4">
              @foreach ($category->recipes as $recipe)
                <div class="flex items-center rounded-md bg-[#2b3947] p-6 text-white shadow-md">
                  <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}"
                    class="-ml-4 mr-4 h-16 w-16 rounded-full border-2 object-cover" />
                  <div class="flex flex-col">
                    <span class="text-lg font-semibold">{{ $recipe->title }}</span>
                    <div class="mt-1 flex gap-4 text-sm text-gray-300">
                      <div class="flex items-center gap-1">
                        🍽️ <span>{{ $recipe->servings }} Porsi</span>
                      </div>
                      <span>|</span>
                      <div class="flex items-center gap-1">
                        ⏱️ <span>{{ $recipe->cook_minutes }} menit</span>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>
      <div class="sr-item flex justify-center">
        <button class="mt-6 rounded-3xl bg-[#374552] px-4 py-2 text-white">
          <a href="/recipes">More Recipes</a>
        </button>
      </div>
    </div>
  </section>

  <section class="sr-fade-up">
    <div class="wrapper py-[120px]">
      <h2 class="sr-item mb-6 text-center text-4xl font-bold text-[#374552] md:text-5xl lg:text-4xl xl:text-6xl">
        Our Blog
      </h2>

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

                {{-- Info author dan waktu baca --}}
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

      <div class="mt-6 flex items-center justify-center">
        <button class="sr-item rounded-3xl bg-[#374552] px-4 py-2 text-white">
          <a href="{{ route('web.blog.index') }}">More Blogs</a>
        </button>
      </div>
    </div>
  </section>

  <section class="wrapper pb-[120px]">
    <h2 class="sr-item mb-6 text-center text-4xl font-bold text-[#374552] md:text-5xl lg:text-4xl xl:text-6xl">
      Gallery
    </h2>

    @if ($recipeImages->count() >= 4)
      <div class="grid grid-cols-2 gap-4">
        <div class="flex flex-col gap-4">
          <div class="sr-item h-72">
            <img src="{{ asset('storage/' . $recipeImages[0]->image) }}" alt="Gambar 1"
              class="h-full w-full rounded-xl object-cover shadow-md">
          </div>
          <div class="sr-item h-32">
            <img src="{{ asset('storage/' . $recipeImages[1]->image) }}" alt="Gambar 2"
              class="h-full w-full rounded-xl object-cover shadow-md">
          </div>
        </div>

        <div class="flex flex-col gap-4">
          <div class="sr-item h-32">
            <img src="{{ asset('storage/' . $recipeImages[2]->image) }}" alt="Gambar 3"
              class="h-full w-full rounded-xl object-cover shadow-md">
          </div>
          <div class="sr-item h-72">
            <img src="{{ asset('storage/' . $recipeImages[3]->image) }}" alt="Gambar 4"
              class="h-full w-full rounded-xl object-cover shadow-md">
          </div>
        </div>
      </div>
    @else
      <p class="sr-item text-center text-gray-500">Belum ada cukup gambar resep untuk gallery.</p>
    @endif
  </section>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      new Splide('#gallery-carousel', {
        type: 'fade',
        rewind: true,
        autoplay: true,
        interval: 3000,
        speed: 1000,
        arrows: true,
        pagination: true,
        classes: {
          arrows: 'splide__arrows flex justify-center mt-4 gap-4',
          arrow: 'splide__arrow bg-[#374552] text-white rounded-full p-2',
        },
      }).mount();

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
