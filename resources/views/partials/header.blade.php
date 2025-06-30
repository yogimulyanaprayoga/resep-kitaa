<nav class="fixed left-0 right-0 top-0 z-50 bg-white shadow">
  <div class="wrapper mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
      <!-- Logo -->
      <div class="flex-shrink-0">
        <a href="/">
          <img src="{{ asset('logo-resep-kita.png') }}" alt="Logo" class="h-12 w-auto">
        </a>
      </div>

      <!-- Desktop Menu -->
      <div class="hidden gap-6 md:flex">
        <a href="/"
          class="{{ Request::is('/') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2 border-transparent pb-1 transition">
          Home
        </a>
        <a href="/recipes"
          class="{{ Request::is('recipes*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2 border-transparent pb-1 transition">
          Resep
        </a>
        <a href="/blog"
          class="{{ Request::is('blog*') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2 border-transparent pb-1 transition">
          Blog
        </a>
        <a href="/tentang-kami"
          class="{{ Request::is('tentang-kami') ? 'text-blue-600 border-b-2 border-blue-600' : 'text-gray-700 hover:text-blue-600 hover:border-blue-600' }} border-b-2 border-transparent pb-1 transition">
          Tentang Kami
        </a>
      </div>

      <!-- Mobile Hamburger -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu (Dropdown ke bawah) -->
  <div id="mobile-menu" class="hidden space-y-2 bg-white px-4 py-4 shadow md:hidden">
    <a href="/"
      class="{{ Request::is('/') ? 'text-blue-600 font-medium' : 'text-gray-700' }} block rounded px-2 py-2 hover:bg-gray-100">
      Home
    </a>
    <a href="/recipes"
      class="{{ Request::is('recipes*') ? 'text-blue-600 font-medium' : 'text-gray-700' }} block rounded px-2 py-2 hover:bg-gray-100">
      Resep
    </a>
    <a href="/blog"
      class="{{ Request::is('blog*') ? 'text-blue-600 font-medium' : 'text-gray-700' }} block rounded px-2 py-2 hover:bg-gray-100">
      Blog
    </a>
    <a href="/tentang-kami"
      class="{{ Request::is('tentang-kami') ? 'text-blue-600 font-medium' : 'text-gray-700' }} block rounded px-2 py-2 hover:bg-gray-100">
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
