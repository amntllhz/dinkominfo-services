@props(['instansi'])

<div class="border-b border-gray-900/10 pb-12">
<h2 class="text-lg font-bold leading-7 text-violet-700">Data {{ $slot }}</h2>
<p class="mt-1 text-sm leading-6 text-gray-600">Form dengan tanda ( <span class="text-red-500">*</span> ) wajib diisi</p>

<div class="mt-10 grid grid-cols-6 sm:grid-cols-1 gap-x-6 gap-y-8 sm:gap-y-4">

    <div class="col-span-3 sm:col-span-1">
    <label for="applicant" class="block text-sm font-medium leading-6 text-gray-900">Nama<span class="text-red-500">*</span></label>
    <div class="mt-2">
        <input id="applicant" value="{{ old('applicant') }}" name="applicant" type="text" placeholder="Masukan Nama Lengkap" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
    </div>
    </div>

    
    <div class="col-span-3 sm:col-span-1">
        <label for="instansi" class="block text-sm font-medium leading-6 text-gray-900">Instansi<span class="text-red-500">*</span></label>
        <div class="mt-2">
            <select id="instansi" name="instansi" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-violet-700" required >
                <option value="">Pilih Instansi</option>
                @foreach ($instansi as $inst)
                    <option value="{{ $inst->id }}">{{ $inst->name }}</option>
                @endforeach
                <option value="other">Lainnya (Tambah Baru)</option>
            </select>
        </div>

        <!-- Form untuk instansi baru, awalnya tersembunyi -->
        <div id="newInstansiForm" class="mt-3 hidden">
            <input type="text" id="newInstansiName" name="newInstansiName" placeholder="Nama Instansi" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-violet-700 focus:ring focus:ring-violet-700 focus:ring-opacity-50">
            <input type="text" id="newInstansiAddress" name="newInstansiAddress" placeholder="Alamat Instansi" class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-violet-700 focus:ring focus:ring-violet-700 focus:ring-opacity-50">
            <button type="button" id="addNewInstansi" class="mt-2 px-4 py-2 bg-violet-700 text-white rounded-md hover:bg-violet-800 focus:outline-none focus:ring-2 focus:ring-violet-700 focus:ring-opacity-50">
                Tambah Instansi
            </button>
        </div>
    </div>

    <div class="col-span-3 sm:col-span-1">
    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telepon <span class="text-red-500">*</span></label>
    <div class="mt-2">
        <input id="phone" value="{{ old('phone') }}" name="phone" type="text" inputmode="numeric" placeholder="Masukan Nomor Telepon" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
        @if ($errors->has('phone'))
        <div class="text-red-500">{{ $errors->first('phone') }}</div>
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