@extends('layouts.app')

@section('content')
  <section class="bg-white pt-20">
    <div class="wrapper flex flex-col items-center gap-8 md:flex-row md:gap-16">

      <div class="sr-item text-left md:w-1/2 md:pb-20">
        <h2 class="mb-4 mt-2 text-4xl font-bold text-[#374552]">{{ $recipe->title }}</h2>

        <p class="mb-6 text-lg text-gray-600">
          {{ $recipe->description }}
        </p>

        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-500">
          {{-- Waktu memasak --}}
          <div class="flex items-center gap-1">
            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $recipe->cook_minutes ?? '–' }} menit
          </div>

          {{-- Porsi --}}
          <div class="flex items-center gap-1">
            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M3 10h1l1 2h13l1-2h1m-16 0a2 2 0 012-2h10a2 2 0 012 2m-16 0v6a2 2 0 002 2h12a2 2 0 002-2v-6" />
            </svg>
            {{ $recipe->servings ?? '–' }} porsi
          </div>

          {{-- Kalori --}}
          <div class="flex items-center gap-1">
            🔥 {{ $recipe->calories ?? '–' }} kalori
          </div>

          {{-- Protein --}}
          <div class="flex items-center gap-1">
            🥩 {{ $recipe->protein ?? '–' }}g protein
          </div>

          {{-- Karbohidrat --}}
          <div class="flex items-center gap-1">
            🍚 {{ $recipe->carbohydrate ?? '–' }}g karbo
          </div>

          {{-- Lemak --}}
          <div class="flex items-center gap-1">
            🧈 {{ $recipe->fat ?? '–' }}g lemak
          </div>

          {{-- Serat --}}
          <div class="flex items-center gap-1">
            🌿 {{ $recipe->fiber ?? '–' }}g serat
          </div>
        </div>
      </div>

      <div class="sr-item md:w-1/2">
        <img src="{{ asset('images/koki.png') }}" alt="Gambar Resep" class="h-auto w-full rounded-lg object-cover">
      </div>

    </div>
  </section>

  <section class="sr-fade-up flex h-screen flex-col md:flex-row">
    <!-- KIRI: Gambar -->
    <div class="sticky h-64 w-full md:top-0 md:h-screen md:w-1/2">
      <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}"
        class="h-full w-full object-cover" />
    </div>

    <!-- KANAN: Konten Scroll -->
    <div class="h-[calc(100vh-16rem)] w-full overflow-y-scroll bg-[#4f090b] p-6 md:h-screen md:w-1/2 md:p-8">
      <h3 class="mb-4 text-2xl font-bold text-white">Bahan ({{ $recipe->title }})</h3>

      <p class="mb-6 text-white">
        {{ $recipe->description }}
      </p>

      <h3 class="mb-2 text-2xl font-semibold text-white">Bahan-bahan:</h3>
      <div class="wysiwyg mb-6">
        {!! $recipe->ingredients !!}
      </div>

      <h3 class="mb-2 text-2xl font-semibold text-white">Cara Membuat:</h3>
      <div class="wysiwyg max-w-full">
        {!! $recipe->instructions !!}
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
