@props(['instansi'])

<div class="border-b border-gray-900/10 pb-12">
<h2 class="text-lg font-bold leading-7 text-violet-700">Data {{ $slot }}</h2>
<p class="mt-1 text-sm leading-6 text-gray-600">Form dengan tanda ( <span class="text-red-500">*</span> ) wajib diisi</p>

<div class="mt-10 grid grid-cols-6 sm:grid-cols-1 gap-x-6 gap-y-8 sm:gap-y-4">

    <div class="col-span-3 sm:col-span-1">
    <label for="applicant" class="block text-sm font-medium leading-6 text-gray-900">Nama <span class="text-red-500">*</span></label>
    <div class="mt-2">
        <input id="applicant" value="{{ old('applicant') }}" name="applicant" type="text" placeholder="Masukan Nama Lengkap" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
    </div>
    </div>

    
    <div class="col-span-3 sm:col-span-1">
        <label for="instansi" class="block text-sm font-medium leading-6 text-gray-900">Instansi <span class="text-red-500">*</span></label>
        <div class="mt-2">
            <x-instansi :instansi="$instansi"></x-instansi>
        </div>
    </div>

    <div class="col-span-3 sm:col-span-1">
    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telepon <span class="text-red-500">*</span></label>
    <div class="mt-2">
        <input id="phone" value="{{ old('phone') }}" name="phone" type="text" inputmode="numeric" placeholder="Masukan Nomor Telepon" oninput="this.value = this.value.replace(/[^0-9]/g, '')" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
        @if ($errors->has('phone'))
            <x-alert>{{ $errors->first('phone') }}</x-alert>
        @endif
    </div>
    </div>  
    
    <div class="col-span-3 sm:col-span-1">
    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email <span class="text-red-500">*</span></label>
    <div class="mt-2">
        <input type="email" name="email" id="email" placeholder="Masukan Email"  required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 " value="{{ old('email') }}">
    </div>
    </div>
</div>
</div>