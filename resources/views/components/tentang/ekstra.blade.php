@props(['ekstrakulikuler'])

<section class="py-16 px-4 mt-24">
    <div class="max-w-7xl mx-auto">

        <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">
            Ekstrakurikuler
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

            @forelse ($ekstrakulikuler as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200
                            hover:shadow-xl transition duration-300">

                    <div class="aspect-[16/9] bg-gray-200">
                        <img
                            src="{{ asset('storage/'.$item->foto) }}"
                            class="w-full h-full object-cover"
                            alt="{{ $item->nama }}"
                        >
                    </div>

                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $item->nama }}
                        </h3>
                        <p class="text-sm text-gray-500">
                            {{ $item->jadwal }}
                        </p>
                    </div>
                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">
                    Belum ada data ekstrakurikuler
                </p>
            @endforelse

        </div>
    </div>
</section>
