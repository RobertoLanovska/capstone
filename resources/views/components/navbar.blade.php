<nav class="bg-gradient-to-r from-green-800 via-green-900 to-emerald-900 text-white fixed w-full z-50 top-0 shadow-2xl transition-all duration-300 ease-in-out backdrop-blur-md">
    <div class="absolute inset-0 bg-gradient-to-r from-green-700/25 via-transparent to-emerald-700/25 pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="flex justify-between items-center h-16 sm:h-18">

            <!-- Logo + Nama -->
            <div class="flex items-center space-x-3 sm:space-x-4">
                <a href="/" class="flex items-center space-x-3 transition-all duration-300 hover:scale-105 active:scale-95 group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-white rounded-full blur-md opacity-60 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <img src="{{ asset('image/logo.png') }}" alt="Logo Sekolah"
                             class="relative h-10 w-10 sm:h-11 sm:w-11 object-contain rounded-full shadow-lg bg-white p-1.5 transition-all duration-300 group-hover:shadow-2xl ring-2 ring-white/30">
                    </div>
                    <span class="text-lg sm:text-xl font-bold tracking-tight hover:text-white transition-colors duration-300" style="text-shadow: 0 2px 20px rgba(255,255,255,0.3);">
                        MI Nahdlatul Ummah Golokan
                    </span>
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden md:flex space-x-3 lg:space-x-4 text-sm sm:text-base font-semibold items-center">
                <a href="/" class="px-4 lg:px-5 py-3 rounded-lg hover:bg-white/15 hover:text-white transition-all duration-300 transform hover:scale-105 active:scale-95 hover:shadow-lg">
                    HOME
                </a>

                <!-- Dropdown Tentang -->
                <div class="relative group">
                    <div class="px-4 lg:px-5 py-3 rounded-lg hover:bg-white/15 hover:text-white transition-all duration-300 cursor-pointer flex items-center gap-2 transform group-hover:scale-105">
                        Tentang
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    <div class="absolute left-0 mt-3 w-64 bg-white text-gray-800 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 ease-out transform -translate-y-2 overflow-hidden border border-green-100 ring-1 ring-black/5">
                        <div class="py-2">
                            <a href="/tentang/profile" class="block px-5 py-3 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-200 transform hover:translate-x-2 border-l-4 border-transparent hover:border-green-600">Profile Sekolah</a>
                            <a href="/tentang/guru" class="block px-5 py-3 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-200 transform hover:translate-x-2 border-l-4 border-transparent hover:border-green-600">Guru</a>
                            <a href="/tentang/ekstra" class="block px-5 py-3 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-200 transform hover:translate-x-2 border-l-4 border-transparent hover:border-green-600">Ekstrakurikuler</a>
                            <a href="/tentang/sarpras" class="block px-5 py-3 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-200 transform hover:translate-x-2 border-l-4 border-transparent hover:border-green-600">Sarana dan Prasarana</a>
                        </div>
                    </div>
                </div>

                <!-- Dropdown Informasi -->
                <div class="relative group">
                    <div class="px-4 lg:px-5 py-3 rounded-lg hover:bg-white/15 hover:text-white transition-all duration-300 cursor-pointer flex items-center gap-2 transform group-hover:scale-105">
                        Informasi
                        <svg class="w-5 h-5 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                    <div class="absolute left-0 mt-3 w-64 bg-white text-gray-800 rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible group-hover:translate-y-0 transition-all duration-300 ease-out transform -translate-y-2 overflow-hidden border border-green-100 ring-1 ring-black/5">
                        <div class="py-2">
                            <a href="/informasi/berita" class="block px-5 py-3 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-200 transform hover:translate-x-2 border-l-4 border-transparent hover:border-green-600">Berita</a>
                            <a href="/informasi/prestasi" class="block px-5 py-3 hover:bg-gradient-to-r hover:from-green-50 hover:to-emerald-50 hover:text-green-700 transition-all duration-200 transform hover:translate-x-2 border-l-4 border-transparent hover:border-green-600">Prestasi</a>
                        </div>
                    </div>
                </div>

                <a href="/ppdb" class="px-5 lg:px-6 py-3 bg-white text-green-800 rounded-lg hover:bg-green-50 transition-all duration-300 font-bold shadow-md hover:shadow-xl transform hover:scale-105 active:scale-95 ml-2 ring-2 ring-white/30">
                    PPDB
                </a>
            </div>

            <!-- Tombol Mobile -->
            <div class="md:hidden flex items-center">
                <button id="menu-btn" class="focus:outline-none hover:bg-white/15 p-3 rounded-lg transition-all duration-300 transform active:scale-90 shadow-md">
                    <svg id="menu-icon" class="w-7 h-7 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path id="menu-path" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div id="mobile-menu" class="hidden md:hidden bg-gradient-to-b from-green-900 to-green-800 border-t border-white/20 shadow-inner h-auto min-h-screen overflow-y-auto">
        <div class="py-6 space-y-3">
            <a href="/" class="block px-5 py-4 hover:bg-white/20 transition-all duration-200 border-l-4 border-transparent hover:border-white font-semibold rounded-r-lg mx-2 text-base text-white">
                HOME
            </a>

            <!-- TENTANG -->
            <div class="border-l-4 border-transparent mx-2">
                <button class="w-full text-left px-5 py-4 hover:bg-white/20 transition-all duration-200 flex justify-between items-center font-semibold mobile-dropdown-btn rounded-r-lg text-base text-white">
                    <span>TENTANG</span>
                    <svg class="w-6 h-6 transition-transform duration-300 mobile-dropdown-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="hidden bg-green-800/60 backdrop-blur-sm mobile-dropdown-content rounded-b-lg overflow-hidden">
                    <a href="/tentang/profile" class="block pl-10 pr-5 py-3 hover:bg-white/20 transition-all duration-200 text-sm border-l-4 border-transparent hover:border-white font-medium text-white">Profile Sekolah</a>
                    <a href="/tentang/guru" class="block pl-10 pr-5 py-3 hover:bg-white/20 transition-all duration-200 text-sm border-l-4 border-transparent hover:border-white font-medium text-white">Guru</a>
                    <a href="/tentang/ekstra" class="block pl-10 pr-5 py-3 hover:bg-white/20 transition-all duration-200 text-sm border-l-4 border-transparent hover:border-white font-medium text-white">Ekstrakurikuler</a>
                    <a href="/tentang/sarpras" class="block pl-10 pr-5 py-3 hover:bg-white/20 transition-all duration-200 text-sm border-l-4 border-transparent hover:border-white font-medium text-white">Sarana dan Prasarana</a>
                </div>
            </div>

            <!-- INFORMASI -->
            <div class="border-l-4 border-transparent mx-2">
                <button class="w-full text-left px-5 py-4 hover:bg-white/20 transition-all duration-200 flex justify-between items-center font-semibold mobile-dropdown-btn rounded-r-lg text-base text-white">
                    <span>INFORMASI</span>
                    <svg class="w-6 h-6 transition-transform duration-300 mobile-dropdown-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>
                <div class="hidden bg-green-800/60 backdrop-blur-sm mobile-dropdown-content rounded-b-lg overflow-hidden">
                    <a href="/informasi/berita" class="block pl-10 pr-5 py-3 hover:bg-white/20 transition-all duration-200 text-sm border-l-4 border-transparent hover:border-white font-medium text-white">Berita</a>
                    <a href="/informasi/prestasi" class="block pl-10 pr-5 py-3 hover:bg-white/20 transition-all duration-200 text-sm border-l-4 border-transparent hover:border-white font-medium text-white">Prestasi</a>
                </div>
            </div>

            <a href="/ppdb" class="block px-5 py-4 bg-white/25 hover:bg-white/35 transition-all duration-200 border-l-4 border-white font-bold active:bg-white/45 mx-3 rounded-lg my-3 shadow-lg text-center text-base text-green-800">
                PPDB
            </a>
        </div>
    </div>

    <!-- Script -->
    <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const dropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        dropdownBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const content = btn.nextElementSibling;
                const icon = btn.querySelector('.mobile-dropdown-icon');
                content.classList.toggle('hidden');
                icon.classList.toggle('rotate-180');
            });
        });

        // Tutup menu jika klik di luar navbar
        document.addEventListener('click', (e) => {
            if (!e.target.closest('nav')) {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</nav>
