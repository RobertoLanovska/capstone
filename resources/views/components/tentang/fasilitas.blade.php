@props(['sarpas'])
<section class="py-16 px-4 font-body">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-5xl font-heading font-bold text-center text-gray-800 pt-20 mb-12 tracking-tight">
            Fasilitas
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            @forelse ($sarpas as $item)
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    
                    <div class="aspect-[16/9] bg-gray-200">
                        <img 
                            src="{{ asset('storage/'.$item->foto) }}"
                            alt="{{ $item->ruangan }}"
                            class="w-full h-full object-cover"
                            loading="lazy"
                        >
                    </div>

                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">
                            {{ $item->ruangan }}
                        </h3>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">
                    Data fasilitas belum tersedia
                </p>
            @endforelse
        </div>
    </div>
</section>
