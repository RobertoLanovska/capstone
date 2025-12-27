<section id="berita" class="py-20 bg-gray-50">
  <div class="container mx-auto px-6 md:px-12">
    <!-- Judul -->
    <div class="text-center mb-12">
      <h3 class="text-lg font-semibold text-blue-700">Berita</h3>
      <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mt-2">
        Kisah inspiratif dari sekolah kami
      </h2>
      <p class="text-gray-600 mt-3">
        Temukan cerita menarik tentang pencapaian dan pengalaman siswa
      </p>
    </div>

    <div id="berita-container" class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Card berita -->
       @foreach ($beritaList as $index => $berita)
      <div class="bg-white border rounded-xl overflow-hidden shadow hover:shadow-lg transition duration-300">
        <img src="{{ asset('storage/' . $berita->foto) }}" alt="{{ $berita->judul }}"
          class="w-full h-52 object-cover">
        <div class="p-6">
          <div class="flex items-center text-sm text-gray-500 mb-3 space-x-4">
            <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full text-xs font-semibold">Pendidikan</span>
            <span>5 menit membaca</span>
          </div>
          <h3 class="text-lg font-bold text-gray-900 mb-2">
            {{ $berita->judul }}
          </h3>
          <p class="text-gray-600 text-sm mb-4">
            {{ Str::limit(strip_tags($berita->deskripsi), 70) }}
          </p>
          <a href="informasi/berita" class="text-blue-600 font-semibold flex items-center hover:underline">
            Baca Selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-4 h-4 ml-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
            </svg>
          </a>
        </div>
      </div>
        @endforeach
    
    </div>
  </div>
</section>