@props(['fotosdm', 'guru', 'karyawan'])


<section class="py-16 px-4">
    <div class="max-w-7xl mx-auto">
        <!-- FOTO SDM -->
        @php
            $fotoTerbaru = $fotosdm->first();
        @endphp

        @if ($fotoTerbaru)
            <div class="mb-8 mt-12">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">

                    <div class="aspect-video bg-gray-200">
                        <img src="{{ asset('storage/' . $fotoTerbaru->foto) }}" class="w-full h-full object-cover">
                    </div>

                    <div class="p-4 text-center bg-gray-50">
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $fotoTerbaru->judul }}
                        </h3>
                        <p class="text-sm text-gray-600">
                            {{ $fotoTerbaru->deskripsi }}
                        </p>
                    </div>

                </div>
            </div>
        @endif

        <!-- Title -->
        <h1 class="text-5xl font-heading font-bold text-center text-gray-800 mb-16">
            GURU DAN KARYAWN
        </h1>

        <!-- Guru Section -->
        <div class="mb-20">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Guru</h2>

            <!-- Grid Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">

                @forelse ($guru as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200
                           hover:shadow-xl transition-shadow duration-300">

                        <!-- FOTO -->
                        <div class="aspect-[3/4] bg-gray-200">
                            <img src="{{ asset('storage/' . $item->profile) }}" alt="{{ $item->nama }}"
                                class="w-full h-full object-cover" loading="lazy">
                        </div>

                        <!-- KETERANGAN -->
                        <div class="p-6 text-center">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                {{ $item->nama }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ $item->jabatan ?? $item->mapel }}
                            </p>
                        </div>

                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">
                        Data guru belum tersedia
                    </p>
                @endforelse

            </div>
        </div>


        <!-- Karyawan Section -->
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Karyawan</h2>

            <!-- Grid Cards -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4">
                <!-- Card 1 -->
                @forelse ($karyawan as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200
                           hover:shadow-xl transition-shadow duration-300">

                        <!-- FOTO -->
                        <div class="aspect-[3/4] bg-gray-200">
                            <img src="{{ asset('storage/' . $item->profile) }}" alt="{{ $item->nama }}"
                                class="w-full h-full object-cover" loading="lazy">
                        </div>

                        <!-- KETERANGAN -->
                        <div class="p-6 text-center">
                            <h3 class="text-lg font-semibold text-gray-800 mb-1">
                                {{ $item->nama }}
                            </h3>
                            <p class="text-sm text-gray-500">
                                {{ $item->jabatan ?? $item->mapel }}
                            </p>
                        </div>

                    </div>
                @empty
                    <p class="col-span-full text-center text-gray-500">
                        Data karyawan belum tersedia
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</section>