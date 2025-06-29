@extends('layouts.app')

@section('content')
  <section class="wrapper">
    <div class="pt-[100px]">
      <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
        class="sr-item h-[400px] w-full object-cover">
      <div class="sr-item mt-2 flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#374552]" fill="none" viewBox="0 0 24 24"
          stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span>{{ $post->read_time }}</span>
      </div>
      <h1 class="sr-item mt-6 text-2xl md:text-3xl lg:text-5xl">{{ $post->title }}</h1>
      <p class="sr-item mt-2">{{ $post->short_description }}</p>

      <div class="sr-fade-up mt-6">
        <p>{{ $post->author->name ?? 'Unknown Author' }}</p>
        <p>{{ $post->created_at->translatedFormat('F d, Y') }}</p>
      </div>
    </div>

    <div class="wysiwyg sr-fade-up mt-10 w-full md:max-w-[60%]">
      {!! $post->content !!}
    </div>
  </section>

  <section class="wrapper py-[120px]">
    <div class="mt-16 md:max-w-[60%]">
      <h2 class="sr-item mb-6 text-2xl font-semibold">Other posts that you might like ❤️</h2>
      <div class="grid gap-6 md:grid-cols-2">
        @foreach ($otherPosts as $other)
          <a href="{{ route('blog.show', $other->slug) }}"
            class="sr-item block overflow-hidden rounded-lg shadow transition hover:shadow-md">
            <img src="{{ asset('storage/' . $other->image) }}" alt="{{ $other->title }}" class="h-48 w-full object-cover">
            <div class="p-4">
              <h3 class="text-lg font-semibold">{{ $other->title }}</h3>
              <p class="mt-1 text-sm text-gray-600">{{ $other->created_at->translatedFormat('F d, Y') }}</p>
            </div>
          </a>
        @endforeach
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
