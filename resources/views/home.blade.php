<x-layout>
    <x-beranda.beranda1 
        :guruCount="$guruCount"
        :jumlahSiswa="$jumlahSiswa"
        :jumlahPrestasi="$jumlahPrestasi"
    />
    <x-beranda.sambutan />
    <x-beranda.vnv />
    <x-beranda.prestasih 
        :prestasiList="$prestasiList"
    />
    <x-beranda.beritah 
        :beritaList="$beritaList"
    />
</x-layout>

