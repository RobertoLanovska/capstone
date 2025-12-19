@props(['prestasi'])

<section class="py-16 px-4 font-body">
    <div class="max-w-7xl mx-auto">

        <h1 class="text-5xl font-heading font-bold text-center text-gray-800 pt-20 mb-12 tracking-tight">
            Prestasi
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            @foreach ($prestasi as $item)
                <div
                    x-data="{ open: false }"
                    class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200
                           hover:shadow-xl transition cursor-pointer">

                    <!-- CARD (CLICKABLE) -->
                    <div @click="open = true">
                        <div class="aspect-[3/4] bg-gray-200">
                            <img
                                src="{{ asset('storage/'.$item->foto) }}"
                                alt="{{ $item->judul }}"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="p-4 text-center bg-gray-50">
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $item->judul }}
                            </h3>
                        </div>
                    </div>

                    <!-- MODAL -->
                    <div
                        x-show="open"
                        x-transition
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/60"
                        @click.self="open = false"
                        x-cloak>

                        <div class="bg-white rounded-xl max-w-lg w-full mx-4 overflow-hidden">

                            <!-- FOTO -->
                            <div class="aspect-[3/4] bg-gray-200">
                                <img
                                    src="{{ asset('storage/'.$item->foto) }}"
                                    class="w-full h-full object-cover">
                            </div>

                            <!-- CONTENT -->
                            <div class="p-6 text-center">
                                <h3 class="text-2xl font-bold mb-2">
                                    {{ $item->judul }}
                                </h3>

                                <p class="text-gray-600 text-sm mb-4">
                                    {{ $item->deskripsi }}
                                </p>

                                <button
                                    @click="open = false"
                                    class="mt-2 px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                                    Tutup
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </div>
</section>
