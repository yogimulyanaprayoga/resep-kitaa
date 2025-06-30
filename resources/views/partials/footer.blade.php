<footer class="mt-20 border-t border-gray-200 bg-gray-100 py-10 text-gray-700">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col items-center justify-between gap-8 md:flex-row">

      <!-- Navigasi -->
      <nav class="flex flex-wrap justify-center gap-4 text-sm font-medium md:justify-start">
        <a class="transition hover:text-blue-600" href="/">Home</a>
        <a class="transition hover:text-blue-600" href="/recipes">Resep</a>
        <a class="transition hover:text-blue-600" href="/blog">Blog</a>
        <a class="transition hover:text-blue-600" href="/tentang-kami">Tentang Kami</a>
      </nav>

      <!-- Ikon Sosial Media -->
      <div class="flex gap-4">
        <!-- Twitter -->
        <a href="#" aria-label="Twitter" class="text-gray-500 transition hover:text-blue-500">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path
              d="M24 4.557a9.832 9.832 0 01-2.828.775 4.932 4.932 0 002.165-2.724 9.864 9.864 0 01-3.127 1.195 4.916 4.916 0 00-8.38 4.482A13.945 13.945 0 011.671 3.149a4.917 4.917 0 001.523 6.573A4.904 4.904 0 01.96 9.149v.062a4.919 4.919 0 003.946 4.827 4.902 4.902 0 01-2.212.084 4.923 4.923 0 004.6 3.417A9.867 9.867 0 010 21.542a13.945 13.945 0 007.548 2.212c9.056 0 14.002-7.512 14.002-14.02 0-.213-.005-.426-.014-.637A10.012 10.012 0 0024 4.557z" />
          </svg>
        </a>

        <!-- YouTube -->
        <a href="#" aria-label="YouTube" class="text-gray-500 transition hover:text-red-600">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path
              d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0C.488 3.45.03 5.804 0 12c.03 6.185.485 8.55 4.385 8.816 3.599.245 11.626.246 15.23 0 3.896-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.55-4.385-8.816zM9 15.998V7.998l8 4-8 4z" />
          </svg>
        </a>

        <!-- Facebook -->
        <a href="#" aria-label="Facebook" class="text-gray-500 transition hover:text-blue-700">
          <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24">
            <path
              d="M22.675 0h-21.35C.6 0 0 .6 0 1.337v21.326C0 23.4.6 24 1.325 24H12.82v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.097 2.795.14v3.24h-1.918c-1.504 0-1.796.715-1.796 1.763v2.312h3.591l-.467 3.622h-3.124V24h6.116C23.4 24 24 23.4 24 22.663V1.337C24 .6 23.4 0 22.675 0z" />
          </svg>
        </a>
      </div>
    </div>

    <!-- Copyright -->
    <div class="mt-8 text-center text-sm text-gray-500">
      &copy; {{ date('Y') }} — All rights reserved by <span class="font-semibold">Resep Kita</span>.
    </div>
  </div>
</footer>
