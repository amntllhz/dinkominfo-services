@props(['services'])
<section id="services" class="services max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
        <div class="gap-y-2 text-center">
        <h3 class="text-5xl text-indigo-950 font-clash font-bold mb-2 sm:text-4xl">Layanan Tersedia</h3>
        <p class="text-base leading-loose text-gray-500 mb-7 sm:text-xs sm:max-w-xs sm:mx-auto">Layanan digital terintegrasi untuk Pemerintah Daerah Kabupaten Pekalongan</p>
        </div>

        <div class="grid grid-cols-4 sm:grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">
    @foreach ($services as $service)
        <div class="w-full flex flex-col gap-y-5 bg-white rounded-2xl p-6 sm:items-center sm:text-center sm:max-w-xs sm:mx-auto">
            <div class="bg-violet-100 rounded-xl p-2 w-fit">
                <img src="{{ Storage::url($service->icon) }}" height="46px" width="46px" >
            </div>
            <div class="flex flex-col">
            <h3 class="font-bold text-xl">{{ $service->name }}</h3>
            <p class="text-base mt-3 leading-normal text-gray-500">{{ $service->tagline }}</p>
            </div>
            <div class="flex justify-between items-center">
                <a href="{{ route('form.layanan', ['slug' => $service->slug]) }}" class="font-semibold text-violet-700 hover:bg-slate-200 p-2 w-fit rounded-md">Pengajuan</a>
                <p>
                <x-heroicon-o-information-circle class="w-5 h-5 text-gray-500" data-popover-target="popover-{{ $service->id }}"/>
                </p>
            </div>
            <div data-popover id="popover-{{ $service->id }}" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                <h3 class="font-semibold text-gray-900 dark:text-white">Tentang {{ $service->name }}</h3>
            </div>
            <div class="px-3 py-2">
                <p>{{ $service->description }}</p>
            </div>
            <div data-popper-arrow></div>
        </div> 
            
        </div>
    @endforeach
        </div>
    </section>