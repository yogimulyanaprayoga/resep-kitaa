<nav class="fixed left-0 right-0 top-0 z-30 bg-white">
  <div class="wrapper mx-auto max-w-7xl">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="/">
          <img src="{{ asset('logo-resep-kita.png') }}" alt="Logo" class="h-16 w-auto">
        </a>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden gap-4 space-x-8 md:flex">
        <a href="/"
          class="{{ Request::is('/') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2">
          Home
        </a>
        <a href="/recipes"
          class="{{ Request::is('recipes*') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2">
          Resep
        </a>
        <a href="/blog"
          class="{{ Request::is('blog*') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} block border-b-2">
          Blog
        </a>
        <a href="/tentang-kami"
          class="{{ Request::is('tentang-kami') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2 pb-1">
          Tentang Kami
        </a>
      </div>

      <!-- Mobile Hamburger -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden px-4 pb-4 md:hidden">
    <a href="/"
      class="{{ Request::is('/') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2">
      Home
    </a>
    <a href="/recipes"
      class="{{ Request::is('recipes*') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2">
      Resep
    </a>
    <a href="/blog"
      class="{{ Request::is('blog*') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} block border-b-2">
      Blog
    </a>
    <a href="/tentang-kami"
      class="{{ Request::is('tentang-kami') ? 'border-blue-600 text-blue-600' : 'border-transparent text-gray-700 hover:text-blue-600 hover:border-blue-600' }} block border-b-2">
      Tentang Kami
    </a>
  </div>
</nav>

<script>
  // Toggle mobile menu
  document.addEventListener("DOMContentLoaded", function() {
    const button = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    button.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  });
</script>
