<section class="py-16 px-4 mt-24">
    <div class="max-w-7xl mx-auto flex justify-center">

        @forelse ($ppdb as $item)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200
                        w-full max-w-sm">

                <!-- Gambar Poster -->
                <div class="aspect-[9/16] bg-gray-200 flex items-center justify-center">
                    <img 
                        src="{{ asset('storage/'.$item->foto) }}"
                        alt="{{ $item->judul }}"
                        class="max-h-full max-w-full object-contain"
                        loading="lazy"
                    >
                </div>

                <!-- Caption -->
                <div class="p-4 text-center bg-gray-50">
                    <h3 class="text-lg font-semibold text-gray-800">
                        {{ $item->judul }}
                    </h3>
                    <p class="text-sm text-gray-600">
                        {{ $item->deskripsi }}
                    </p>
                </div>

            </div>
        @empty
            <p class="text-gray-500">
                Data PPDB belum tersedia.
            </p>
        @endforelse

    </div>
</section>