@extends('layouts.front')

@section('title', 'Beranda')

@section('content')
<section class="max-w-6xl mx-auto py-12 md:max-w-lg sm:max-w-xs">
    <div class="flex flex-col gap-y-2 text-center mb-8">
        <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-3xl">Contributors</h3>
        <p class="text-base font-semibold leading-loose text-violet-700 sm:text-xs sm:py-1 sm:px-2 bg-violet-100 rounded-full w-fit px-8 mx-auto md:text-sm md:py-1">Praktik Kerja Lapangan Dinkominfo Kabupaten Pekalongan 2024</p>
    </div>
    
    <div class="text-base text-gray-500 text-justify mb-6 max-w-5xl mx-auto">
        <p>Selamat datang di halaman Contributors! Kami adalah mahasiswa peserta Praktik Kerja Lapangan (PKL) di Dinas Komunikasi dan Informatika (Dinkominfo) Kabupaten Pekalongan tahun 2024.</p>
        <p class="py-4">
        Kami adalah mahasiswa PKL di Dinas Komunikasi dan Informatika Kabupaten Pekalongan tahun 2024. Selama PKL, kami terlibat dalam pengembangan web "Portal Layanan Digitalisasi OPD," pembuatan web buku tamu, dan perancangan desain grafis untuk informasi digital. Pengalaman ini memberi kami kesempatan untuk menerapkan ilmu kuliah dalam proyek nyata yang berdampak pada masyarakat, sekaligus belajar teknologi terkini, kerja tim, dan manajemen proyek. Kami berterima kasih kepada Dinkominfo Kabupaten Pekalongan atas kesempatan ini dan bangga berkontribusi dalam digitalisasi pelayanan publik.
        </p> 
    </div>
    <x-contributor :interns="$interns"></x-contributor>

</section>

@endsection