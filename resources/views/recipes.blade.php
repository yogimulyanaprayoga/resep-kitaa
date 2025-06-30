@extends('layouts.app')
{{-- #374552 --}}
@section('content')
  <section class="sr-fade-up bg-white py-20">
    <div class="wrapper flex flex-col items-center gap-8 md:flex-row md:gap-16">

      <!-- Kiri: Teks -->
      <div class="text-center md:w-1/2 md:text-left">
        <h2 class="mb-4 text-4xl font-bold text-[#374552]">Cari Resep Makanan Favorit Mu di Sini!</h2>
        <p class="mb-6 text-lg text-gray-600">
          Temukan berbagai resep lezat dari masakan rumahan hingga kuliner nusantara hanya dengan sekali klik!
        </p>
        <a href="#deteksi"
          class="inline-block rounded-full bg-[#374552] px-6 py-3 font-semibold text-white transition hover:bg-[#2b3947]">
          Coba Sekarang
        </a>
      </div>

      <!-- Kanan: Gambar -->
      <div class="md:w-1/2">
        <img src="{{ asset('images/recipes-food.jpg') }}" alt="Gambar Resep"
          class="h-auto w-full rounded-lg object-cover shadow-md">
      </div>

    </div>
  </section>

  <section id="upload-form" class="bg-[#fff6f6] py-16">
    <div class="wrapper flex flex-col items-center gap-10 md:flex-row md:items-start md:gap-16">

      <!-- Kiri: Copywriting -->
      <div class="sr-item text-center md:w-1/2 md:text-left">
        <h2 id="deteksi" class="mb-4 text-4xl font-bold text-[#374552]">Deteksi Otomatis Makanan dari Gambar</h2>
        <p class="mb-6 text-lg text-gray-600">
          Cukup upload gambar makananmu, dan sistem AI kami akan mengenali jenis makanannya
          secara otomatis, lalu menampilkan resep yang sesuai. Cepat, mudah, dan akurat!
        </p>
        <button
          class="inline-block rounded-full bg-[#374552] px-6 py-3 font-semibold text-white transition hover:bg-[#2b3947]"
          onclick="my_modal_3.showModal()">Bantuan Pengguna</button>
        <dialog id="my_modal_3" class="modal rounded-3xl p-6">
          <div class="modal-box">
            <form method="dialog">
              <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="mb-2 text-lg font-bold">Bantuan Aplikasi</h3>
            <h5>Cara Menggunakan Aplikasi</h5>
            <ul class="list-inside list-disc text-left text-gray-600">
              <li>Pastikan Anda berada di halaman <a href="/recipes" class="font-bold">Resep</a></li>
              <li>Upload gambar makanan yang ingin Anda cari resepnya</li>
              <li>Klik tombol "Deteksi Sekarang"</li>
              <li>Hasil resep yang sesuai akan ditampilkan secara otomatis</li>
            </ul>
          </div>
        </dialog>
      </div>

      <!-- Kanan: Form Upload -->
      <div class="sr-item w-full max-w-lg md:w-1/2">
        <form action="{{ route('recipes.upload.form') }}" method="POST" enctype="multipart/form-data"
          class="rounded-xl bg-white p-6 shadow-md">
          @csrf

          <label for="image" class="mb-2 block text-left font-semibold text-[#374552]">Upload Gambar Makanan:</label>

          <div onclick="triggerFileInput()"
            class="mb-4 flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-blue-400 bg-blue-50 p-6 text-center transition hover:bg-blue-100">
            <svg class="mb-2 h-10 w-10 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 16l4-4a4 4 0 015.657 0L21 5M4 20h16" />
            </svg>
            <p class="text-sm text-blue-600">Klik atau seret gambar ke sini</p>
          </div>

          <input type="file" name="image" id="image" accept="image/*" required onchange="previewImage(event)"
            class="hidden" />

          <div id="image-preview" class="mb-4 hidden">
            <p class="mb-2 text-left text-sm text-gray-500">Pratinjau Gambar:</p>
            <img id="preview" src="#" alt="Preview" class="mx-auto max-h-64 rounded-lg shadow" />
          </div>

          <button type="submit" class="w-full rounded bg-blue-500 py-3 text-white transition hover:bg-blue-600">
            Deteksi Sekarang
          </button>
        </form>

      </div>

    </div>
  </section>

  <section class="bg-[#fdf7f9] py-16">
    <div class="wrapper">
      <div class="sr-item mb-10 flex flex-col items-center gap-4 md:flex-row md:justify-between">
        <!-- Judul -->
        <h2 class="text-3xl font-bold text-[#374552]">Temukan Resep</h2>

        <!-- Form Pencarian -->
        <form action="" method="GET"
          class="flex w-full max-w-md items-center rounded-full bg-white shadow-md focus-within:ring-2 focus-within:ring-blue-400">
          <input type="text" name="query" placeholder="Masukkan nama makanan..."
            class="w-full rounded-full px-5 py-5 text-sm text-[#374552] focus:outline-none" />
          <button type="submit" class="mr-2 rounded-full bg-blue-500 p-3 text-white transition hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1010.5 3a7.5 7.5 0 006.15 13.65z" />
            </svg>
          </button>
        </form>
      </div>

      <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        @foreach ($recipes as $recipe)
          <div class="sr-item overflow-hidden rounded-xl bg-white shadow-lg transition hover:shadow-xl">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->title }}"
              class="h-48 w-full object-cover">

            <div class="flex flex-col justify-between p-4">
              <div>
                <a href="{{ route('recipes.show', $recipe->slug) }}">
                  <h3 class="mb-2 text-xl font-semibold text-[#374552]">
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
    </div>
  </section>

  <!-- Tambahkan di bagian <head> -->
  <script>
    function previewImage(event) {
      const preview = document.getElementById("preview");
      const previewContainer = document.getElementById("image-preview");

      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
          preview.src = e.target.result;
          previewContainer.classList.remove("hidden");
        };
        reader.readAsDataURL(file);
      }
    }

    function triggerFileInput() {
      document.getElementById("image").click();
    }
  </script>

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
