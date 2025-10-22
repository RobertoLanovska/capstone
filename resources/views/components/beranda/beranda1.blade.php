<section class="relative w-full h-[100vh] overflow-visible pb-32">
  <!-- Background Image -->
  <img src="https://i.pinimg.com/originals/f5/8f/0b/f58f0b27e08e8d08b19b429f97de8edc.jpg"
       alt="MI Nahdlatul Ummah"
       class="absolute inset-0 w-full h-full object-cover brightness-90">

  <!-- Gradasi hijau sisi kiri -->
  <div class="absolute inset-0 bg-gradient-to-r from-green-800/90 via-green-600/70 to-transparent"></div>

  <!-- Teks sambutan -->
  <div class="absolute top-1/4 left-10 md:left-20 text-white space-y-2">
      <h1 class="text-3xl md:text-5xl font-extrabold leading-tight drop-shadow-md">
          Selamat Datang
      </h1>
      <h2 class="text-2xl md:text-4xl font-semibold drop-shadow-md">
          di MI Nahdlatul Ummah Golokan
      </h2>
  </div>

  <!-- Container putih di bawah -->
  <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 
              w-[90%] md:w-[80%] bg-white rounded-2xl shadow-2xl py-8 px-4 md:px-10">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
          <div>
              <h3 class="text-3xl font-bold text-green-700" id="guruAktif">--</h3>
              <p class="text-gray-600 font-medium">Guru Aktif</p>
          </div>
          <div>
              <h3 class="text-3xl font-bold text-green-700" id="siswa">--</h3>
              <p class="text-gray-600 font-medium">Siswa</p>
          </div>
          <div>
              <h3 class="text-3xl font-bold text-green-700" id="prestasi">--</h3>
              <p class="text-gray-600 font-medium">Prestasi</p>
          </div>
          <div>
              <h3 class="text-3xl font-bold text-green-700" id="tahunBerdiri">--</h3>
              <p class="text-gray-600 font-medium">Tahun Berdiri</p>
          </div>
      </div>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", async () => {
    try {
        const res = await fetch("api/statistik.php");
        const data = await res.json();

        document.getElementById("guruAktif").textContent = data.guru_aktif || 0;
        document.getElementById("siswa").textContent = data.siswa || 0;
        document.getElementById("prestasi").textContent = data.prestasi || 0;
        document.getElementById("tahunBerdiri").textContent = data.tahun_berdiri || "-";
    } catch (error) {
        console.error("Gagal memuat data statistik:", error);
    }
});
</script>
