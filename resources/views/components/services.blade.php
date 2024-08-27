@props(['services'])
<section id="services" class="services max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
        <div class="gap-y-2 text-center">
        <h3 class="text-5xl text-indigo-950 font-clash font-bold mb-2 sm:text-4xl">Layanan Tersedia</h3>
        <p class="text-base leading-loose text-gray-500 mb-7 sm:text-xs sm:max-w-xs sm:mx-auto">Layanan digital terintegrasi untuk Pemerintah Daerah Kabupaten Pekalongan</p>
        </div>

        <div class="grid grid-cols-4 sm:grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">
        @foreach ($services as $service)
        <div class="w-full flex flex-col gap-y-5 bg-white rounded-2xl p-6 sm:items-center sm:text-center sm:max-w-xs sm:mx-auto">
            <img src="{{ Storage::url($service->icon) }}" height="46px" width="46px" >
            <div class="flex flex-col">
            <h3 class="font-bold text-xl">{{ $service->name }}</h3>
            <p class="text-base leading-normal text-gray-500">{{ $service->description }}</p>
            </div>        
            <a href="{{ route('form.layanan', ['slug' => $service->slug]) }}" class="font-semibold text-violet-700 hover:bg-slate-200 p-2 w-fit rounded-md">Pengajuan</a>
        </div>
        @endforeach
        </div>
    </section>