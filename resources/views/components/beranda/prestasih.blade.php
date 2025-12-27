<section id="prestasi" class="py-16 bg-white">
  <div class="container mx-auto px-6 md:px-12 text-center max-w-5xl">
    <!-- Judul -->
    <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-3">
      Prestasi Siswa
    </h2>
    <p class="text-gray-600 mb-10">
      Berbagai capaian gemilang siswa-siswi MI NU Golokan dalam bidang akademik dan non-akademik
    </p>

    <!-- Grid Prestasi -->
    <div id="prestasi-container" class="grid grid-cols-1 md:grid-cols-3 gap-5 mx-auto">
      <!-- Prestasi besar kiri -->
       @foreach ($prestasiList as $index => $prestasi)

        {{-- PRESTASI UTAMA --}}
        @if ($index === 0)
      <div class="md:row-span-2 relative overflow-hidden rounded-2xl shadow-lg group h-[450px]">
        <img src="{{ asset('storage/' . $prestasi->foto) }}"
          alt="{{ $prestasi->judul }}"
          class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        <div
          class="absolute inset-0 bg-black/40 group-hover:bg-black/60 transition-all duration-500 flex flex-col justify-end p-5 text-left text-white">
          <h3 class="text-xl font-bold">{{ $prestasi->judul }}</h3>
          <p class="text-sm mt-1 text-gray-200">
             {{ Str::limit($prestasi->deskripsi, 120) }}
        </div>
      </div>
      {{-- PRESTASI LAINNYA --}}
        @else
      <!-- Prestasi lainnya -->
      <div class="relative overflow-hidden rounded-2xl shadow-lg group h-[230px]">
        <img src="{{ asset('storage/' . $prestasi->foto) }}"
          alt="{{ $prestasi->judul }}"
          class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        <div
          class="absolute inset-0 bg-black/40 group-hover:bg-black/60 flex flex-col justify-end p-5 text-left text-white transition-all duration-500">
          <h3 class="text-base font-bold">{{ $prestasi->judul }}</h3>
          <p class="text-xs mt-1 text-gray-200">{{ Str::limit($prestasi->deskripsi, 80) }}</p>
        </div>
      </div>
       @endif

    @endforeach
      
    </div>

    <!-- Tombol Selengkapnya -->
    <div class="mt-10">
      <a href="informasi/prestasi"
        class="inline-flex items-center px-6 py-3 text-white bg-green-600 hover:bg-green-700 rounded-full shadow-lg transition duration-300 font-semibold">
        Lihat Selengkapnya
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
          class="w-5 h-5 ml-2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
        </svg>
      </a>
    </div>
  </div>
</section>