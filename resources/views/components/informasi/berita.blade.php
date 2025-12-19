@props(['berita'])
<section class="py-16 px-4 font-body">
    <div class="max-w-5xl mx-auto">

        <!-- JUDUL -->
        <h1 class="text-5xl font-heading font-bold text-center text-gray-800 pt-20 mb-12 tracking-tight">
            Berita
        </h1>

        <!-- GRID -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($berita as $item)
                <!-- CARD -->
                <div onclick="openModal({{ $item->id }})" class="cursor-pointer bg-white rounded-xl shadow-md
                               hover:shadow-xl transition overflow-hidden">

                    <div class="aspect-[16/9] bg-gray-200">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="p-5 text-center">
                        <h3 class="text-lg font-news  font-semibold text-gray-800 mb-2 leading-snug">
                            {{ $item->judul }}
                        </h3>
                        <p class="text-sm text-gray-600 leading-relaxed font-times">
                            {{ Str::limit($item->deskripsi, 70) }}
                        </p>
                    </div>
                </div>

                <!-- MODAL -->
                <div id="modal-{{ $item->id }}" class="fixed inset-0 z-50 hidden items-center justify-center
                                bg-black/70 backdrop-blur-sm px-4 font-body">

                    <!-- Overlay -->
                    <div class="absolute inset-0" onclick="closeModal({{ $item->id }})"></div>

                    <!-- Content -->
                    <div class="relative bg-white w-full max-w-xl rounded-2xl shadow-2xl
                                   transform scale-95 opacity-0 transition-all duration-300
                                   modal-content">

                        <!-- Image -->
                        <div class="overflow-hidden rounded-t-2xl">
                            <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->judul }}"
                                class="w-full h-56 object-cover">
                        </div>

                        <!-- Body -->
                        <div class="p-6 text-center">
                            <h2 class="text-2xl font-news font-semibold text-gray-800 mb-3 leading-snug">
                                {{ $item->judul }}
                            </h2>

                            <p class="text-gray-600 leading-loose font-times text-base">
                            <div class="text-gray-600 leading-loose font-times text-left">
                                {!! $item->deskripsi !!}
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<script>
    function openModal(id) {
        const modal = document.getElementById('modal-' + id);
        const content = modal.querySelector('.modal-content');

        modal.classList.remove('hidden');
        modal.classList.add('flex');

        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 50);

        document.addEventListener('keydown', escHandler);
        function escHandler(e) {
            if (e.key === 'Escape') closeModal(id);
        }
    }

    function closeModal(id) {
        const modal = document.getElementById('modal-' + id);
        const content = modal.querySelector('.modal-content');

        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }, 300);
    }
</script>