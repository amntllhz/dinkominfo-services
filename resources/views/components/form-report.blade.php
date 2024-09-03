@props(['services'])

<div class="pb-12">
<h2 class="text-lg font-bold leading-7 text-violet-700">Data Laporan</h2>
<p class="mt-1 text-sm leading-6 text-gray-600">Form dengan tanda ( <span class="text-red-500">*</span> ) wajib diisi</p></p>

<div class="mt-10 grid grid-cols-6 sm:grid-cols-1 gap-x-6 gap-y-8 sm:gap-y-4">

    <div class="col-span-3 sm:col-span-1">
    <label for="service" class="block text-sm font-medium leading-6 text-gray-900">Jenis Layanan<span class="text-red-500">*</span></label>
    <div class="mt-2">
        <select id="service" name="service" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-violet-700">
            <option value="">Pilih Layanan</option>
            @foreach ($services as $service)
                <option value="{{ $service->id }}">{{ $service->name }}</option>
            @endforeach
        </select>
        </div>
    </div>                                                       

    <div class="col-span-full">
    <label for="report" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi Kendala <span class="text-red-500">*</span></label>
    <div class="mt-2">
        <textarea id="report" name="report" rows="3" value="{{ old('report') }}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 "></textarea>
    </div>
    <p class="mt-3 text-sm leading-6 text-gray-600">Tuliskan kendala yang dialami</p>
    @if ($errors->has('report'))
    <div class="text-red-500">{{ $errors->first('report') }}</div>
    @endif
    </div>

    <div class="col-span-full">
        <label for="proof"  class="block text-sm font-medium leading-6 text-gray-900">Screenshot Bukti Laporan<span class="text-red-500">*</span></label>

        <input class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="proof[]" id="proof" type="file" required>

        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or JPG (MAX. 2MB).</p>

        @if ($errors->has('proof.*'))
            <x-alert>{{ $errors->first('proof.*') }}</x-alert>
        @endif
    
    </div>
    

    <div class="mx-auto col-span-full">
    <div class="flex flex-row gap-x-4 h-6 items-center">
        <input id="validasi" name="validasi" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-violet-700 focus:ring-violet-700" required>
        <label for="validasi" class="text-sm font-medium text-gray-900 sm:text-xs">Saya Menyetujui Syarat & Ketentuan yang berlaku</label>
    </div>
    <div class="text-sm leading-6">
        
    </div>
    </div>
</div>
</div>