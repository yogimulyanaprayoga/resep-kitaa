@extends('layouts.app')

@section('content')
  <section class="bg-[#f6f6f6] pb-16 pt-[120px]">
    <div class="wrapper mx-auto max-w-4xl text-center">

      <div class="sr-item mb-8">
        <img src="{{ asset('images/foto-kami.jpeg') }}" alt="Tentang Kami"
          class="mx-auto w-full max-w-md rounded-xl object-cover shadow-md">
      </div>

      <h1 class="sr-item mb-4 text-4xl font-bold text-[#374552]">Tentang Kami</h1>
      <p class="sr-item text-lg text-gray-600">
        Kami percaya bahwa memasak adalah seni dan warisan. Website ini dibuat untuk membagikan inspirasi resep, serta
        memperkenalkan teknologi deteksi makanan tradisional Indonesia kepada dunia.
      </p>
    </div>
  </section>

  <section class="sr-fade-up bg-white py-16">
    <div class="wrapper mx-auto grid max-w-5xl gap-10 px-4 md:grid-cols-2">
      <div>
        <h2 class="mb-4 text-2xl font-semibold text-[#374552]">Visi Kami</h2>
        <p class="leading-relaxed text-gray-600">Menjadi platform kuliner terpercaya yang memperkenalkan keanekaragaman
          resep dan makanan tradisional Indonesia melalui pendekatan teknologi dan komunitas.</p>
      </div>
      <div>
        <h2 class="mb-4 text-2xl font-semibold text-[#374552]">Misi Kami</h2>
        <ul class="list-inside list-disc space-y-2 leading-relaxed text-gray-600">
          <li>Menyediakan resep-resep akurat dan mudah diikuti.</li>
          <li>Mengembangkan sistem deteksi makanan berbasis AI.</li>
          <li>Melestarikan kekayaan kuliner nusantara.</li>
          <li>Mendorong masyarakat untuk memasak lebih sehat dan kreatif.</li>
        </ul>
      </div>
    </div>
  </section>

  <section class="bg-[#f6f6f6] py-16">
    <div class="wrapper mx-auto max-w-6xl px-4">
      <h2 class="sr-item mb-10 text-center text-2xl font-bold text-[#374552]">Tim di Balik Resep Kita</h2>

      <div class="grid gap-8 sm:grid-cols-2 md:grid-cols-4">
        <div class="sr-item text-center">
          <img src="{{ asset('images/yesa-saputri.jpeg') }}" alt="Yesa Saputri"
            class="mx-auto h-40 w-40 rounded-full object-cover shadow-md">
          <h3 class="mt-4 text-lg font-semibold text-[#374552]">Yesa Saputri</h3>
          <p class="text-sm text-gray-500">AI Researcher</p>
        </div>

        <div class="sr-item text-center">
          <img src="{{ asset('images/Herdina-febriyana.jpeg') }}" alt="Herdina Febriyana"
            class="mx-auto h-40 w-40 rounded-full object-cover shadow-md">
          <h3 class="mt-4 text-lg font-semibold text-[#374552]">Herdina Febriyana</h3>
          <p class="text-sm text-gray-500">Web Developer</p>
        </div>

        <div class="sr-item text-center">
          <img src="{{ asset('images/miesna.jpeg') }}" alt="miesna indah rahmadani"
            class="mx-auto h-40 w-40 rounded-full object-cover shadow-md">
          <h3 class="mt-4 text-lg font-semibold text-[#374552]">Miesna Indah Rahmadani</h3>
          <p class="text-sm text-gray-500">Content Editor</p>
        </div>

        <div class="sr-item text-center">
          <img src="{{ asset('images/nur-alya.jpeg') }}" alt="nur alya"
            class="mx-auto h-40 w-40 rounded-full object-cover shadow-md">
          <h3 class="mt-4 text-lg font-semibold text-[#374552]">Nur Alya Dwi Andini Lubis</h3>
          <p class="text-sm text-gray-500">UI/UX Designer</p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-20">
    <div class="wrapper mx-auto max-w-4xl text-center">
      <h2 class="sr-item mb-4 text-2xl font-bold text-[#374552]">Bergabunglah Bersama Kami!</h2>
      <p class="sr-item mb-6 text-gray-600">Mari bersama melestarikan resep-resep lezat dari dapur Indonesia dan
        menyebarkannya ke
        seluruh dunia.</p>
      <a href="/kontak"
        class="sr-item inline-block rounded-full bg-blue-500 px-6 py-3 text-white transition hover:bg-blue-600">Hubungi
        Kami</a>
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
