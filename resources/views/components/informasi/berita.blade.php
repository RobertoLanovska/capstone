@props(['berita'])

<section class="py-16 px-4 font-body">
    <div class="max-w-5xl mx-auto">

        <h1 class="text-5xl font-heading font-bold text-center text-gray-800 pt-20 mb-12 tracking-tight">
            BERITA
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($berita as $item)
                <div x-data="{ open: false }"
                    class="bg-white rounded-xl shadow-md hover:shadow-xl transition overflow-hidden cursor-pointer">

                    <!-- CARD -->
                    <div @click="open = true">
                        <div class="aspect-[16/9] bg-gray-200">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                class="w-full h-full object-cover">
                        </div>

                        <div class="p-5 text-center">
                            <h3 class="text-lg font-news font-semibold text-gray-800 mb-2 leading-snug">
                                {{ $item->judul }}
                            </h3>

                            <p class="text-sm text-gray-600 leading-relaxed font-times">
                                    {{ Str::limit(strip_tags($item->deskripsi), 70) }}
                                </p>
                        </div>
                    </div>

                    <!-- MODAL -->

                    <div x-show="open" x-transition x-cloak @click.self="open = false"
                        class="fixed inset-0 z-50 flex items-center justify-center bg-black/70 px-4">

                        <!-- Modal Box -->
                        <div class="bg-white rounded-2xl max-w-xl w-full shadow-2xl
                            max-h-[90vh] flex flex-col overflow-hidden">

                            <!-- Image (tidak ikut scroll) -->
                            <div class="aspect-[16/9] bg-gray-200 shrink-0">
                                <img src="{{ asset('storage/' . $item->foto) }}" class="w-full h-full object-cover">
                            </div>

                            <!-- Scrollable Content -->
                            <div class="p-6 overflow-y-auto">
                                <h2 class="text-2xl font-news font-semibold text-gray-800 mb-4 text-center">
                                    {{ $item->judul }}
                                </h2>

                                <div class="text-gray-600 leading-loose font-times text-left">
                                    {!! $item->deskripsi !!}
                                </div>

                                <div class="text-center">
                                    <button @click="open = false"
                                        class="mt-6 px-5 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900">
                                        Tutup
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>