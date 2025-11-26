<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ekstrakurikuler</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50">
    <!-- Section Ekstrakurikuler -->
    <section class="py-16 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
                    <div class="aspect-video bg-gray-200">
                        <img src="https://via.placeholder.com/1200x675/3B82F6/FFFFFF?text=Foto+Bersama+Guru"
                            alt="Foto Bersama Guru" class="w-full h-full object-cover" loading="lazy">
                    </div>
                    <div class="p-4 text-center bg-gray-50">
                        <h3 class="text-lg font-semibold text-gray-800">Foto Bersama Guru dan Karyawan</h3>
                        <p class="text-sm text-gray-600">MI NAHDLATUL UMMAH GOLOKAN</p>
                    </div>
                </div>
            </div>

            <!-- Title -->
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-8">
                Ekstrakurikuler
            </h1>

            <!-- Landscape horizontal container (cards tetap desain sama, tapi landscape) -->
            <!-- Grid Landscape 2 foto per baris -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">

                <!-- Card 1 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="aspect-[16/9] bg-gray-200">
                        <img src="https://via.placeholder.com/500x280/3B82F6/FFFFFF?text=Ekstra+1"
                            class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Nama Ekstra</h3>
                        <p class="text-sm text-gray-500">Jadwal Ekstra</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="aspect-[16/9] bg-gray-200">
                        <img src="https://via.placeholder.com/500x280/3B82F6/FFFFFF?text=Ekstra+2"
                            class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Nama Ekstra</h3>
                        <p class="text-sm text-gray-500">Jadwal Ekstra</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="aspect-[16/9] bg-gray-200">
                        <img src="https://via.placeholder.com/500x280/3B82F6/FFFFFF?text=Ekstra+3"
                            class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Nama Ekstra</h3>
                        <p class="text-sm text-gray-500">Jadwal Ekstra</p>
                    </div>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-xl transition duration-300">
                    <div class="aspect-[16/9] bg-gray-200">
                        <img src="https://via.placeholder.com/500x280/3B82F6/FFFFFF?text=Ekstra+4"
                            class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">Nama Ekstra</h3>
                        <p class="text-sm text-gray-500">Jadwal Ekstra</p>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- Small helper style to hide scrollbar on WebKit (ke aesthetic, optional) -->
    <style>
        /* non-essential: menyembunyikan scrollbar di beberapa browser agar tampilan bersih */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</body>

</html>