@extends('layouts.app')

@section('content')
  <section class="wrapper py-[120px]">
    <div class="sr-fade-up mb-8 flex items-center justify-between">
      <h2 class="text-2xl font-bold text-[#374552]">Hasil Deteksi: {{ ucfirst(str_replace('_', ' ', $namaMakanan)) }}</h2>
      <a href="/recipes"
        class="inline-flex items-center gap-2 rounded-full bg-[#374552] px-4 py-2 text-sm font-medium text-white transition hover:bg-[#2b3947]">
        Kembali
      </a>
    </div>

    @if ($recipes->isEmpty())
      <div class="sr-fade-up rounded-lg bg-pink-50 p-6 text-center text-gray-600 shadow">
        <p class="text-lg">Maaf, tidak ada resep ditemukan untuk "<strong>{{ $namaMakanan }}</strong>".</p>
        <p class="mt-2">Silakan coba dengan gambar makanan lainnya.</p>
      </div>
    @else
      <div class="sr-fade-up grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($recipes as $recipe)
          <div class="sr-item overflow-hidden rounded-xl bg-white shadow-md transition hover:shadow-lg">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}"
              class="h-48 w-full object-cover">

            <div class="flex flex-col justify-between p-4">
              <div>
                <a href="{{ route('recipes.show', $recipe->slug) }}">
                  <h3 class="mb-2 text-xl font-semibold text-[#374552] hover:underline">
                    {{ $recipe->title }}
                  </h3>
                </a>

                <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
                  <div class="flex items-center gap-1">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ $recipe->cook_minutes ?? '–' }} menit
                  </div>

                  <div class="flex items-center gap-1">
                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 10h1l1 2h13l1-2h1m-16 0a2 2 0 012-2h10a2 2 0 012 2m-16 0v6a2 2 0 002 2h12a2 2 0 002-2v-6" />
                    </svg>
                    {{ $recipe->servings ?? '–' }} porsi
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @endif
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
