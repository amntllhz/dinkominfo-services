@extends('layouts.form')

@section('title', 'Form Hosting')

@section('content')
  <!-- FORM -->
    <section class="max-w-6xl mx-auto py-12 md:max-w-lg sm:max-w-xs">
        <div class="flex flex-col gap-y-2 text-center mb-10">
            <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-3xl">Pengajuan Hosting</h3>
            <p class="text-base leading-loose text-gray-500 sm:text-sm">Kemudahan Pengajuan yang juga dilengkapi dengan Panduan Penggunaan </p>
          </div>
          <form method="POST" action="{{ route('form.submithosting') }}" enctype="multipart/form-data" class="mx-auto max-w-4xl">
            @csrf
            <div class="space-y-12">
              
              <!-- user -->

              <div class="border-b border-gray-900/10 pb-12">
                <h2 class="text-lg font-bold leading-7 text-violet-700">Data Pemohon</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Form dengan tanda ( <span class="text-red-500">*</span> ) wajib diisi</p>
          
                <div class="mt-10 grid grid-cols-6 sm:grid-cols-1 gap-x-6 gap-y-8 sm:gap-y-4">
                  <div class="col-span-3 sm:col-span-1">
                    <label for="applicant" class="block text-sm font-medium leading-6 text-gray-900">Nama <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                      <input type="text" name="applicant" id="applicant" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                    </div>
                  </div>
          
                  <div class="col-span-3 sm:col-span-1">
                    <label for="instansi" class="block text-sm font-medium leading-6 text-gray-900">Instansi<span class="text-red-500">*</span></label>
                    <div class="mt-2">
                      <input type="text" name="instansi" id="instansi" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                    </div>
                  </div>
          
                  <div class="col-span-3 sm:col-span-1">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                      <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                    </div>
                  </div>

                  <div class="col-span-3 sm:col-span-1">
                    <label for="phone" class="block text-sm font-medium leading-6 text-gray-900">Nomor Telepon <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                      <input id="phone" name="phone" type="phone" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- data -->

              <div class="pb-12">
                <h2 class="text-lg font-bold leading-7 text-violet-700">Data Pengajuan</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Form dengan tanda ( <span class="text-red-500">*</span> ) wajib diisi</p></p>
          
                <div class="mt-10 grid grid-cols-6 sm:grid-cols-1 gap-x-6 gap-y-8 sm:gap-y-4">
                    <div class="col-span-3 sm:col-span-1">
                      <label for="cpu" class="block text-sm font-medium leading-6 text-gray-900">CPU <span class="text-red-500">*</span></label>
                      <div class="mt-2">
                        <input type="text" name="cpu" id="cpu" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                      </div>
                    </div>

                    <div class="col-span-3 sm:col-span-1">
                        <label for="ram" class="block text-sm font-medium leading-6 text-gray-900">RAM<span class="text-red-500">*</span></label>
                        <div class="mt-2">
                          <input type="text" name="ram" id="ram" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                        </div>
                    </div>
                    
                    <div class="col-span-3 sm:col-span-1">
                      <label for="storage" class="block text-sm font-medium leading-6 text-gray-900">Storage <span class="text-red-500">*</span></label>
                      <div class="mt-2">
                        <input type="text" name="storage" id="storage" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                      </div>
                    </div>
          
                  <div class="col-span-full">
                    <label for="purpose" class="block text-sm font-medium leading-6 text-gray-900">Tujuan Pengajuan <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                      <textarea required id="purpose" name="purpose" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 "></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Tuliskan tujuan singkat pengajuan</p>
                  </div>
                  
                  <div class="col-span-full">
                    <label for="add_inform" class="block text-sm font-medium leading-6 text-gray-900">Keterangan Lainnya</label>
                    <div class="mt-2">
                      <textarea required id="add_inform" name="add_inform" rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 "></textarea>
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Tuliskan keterangan tambahan (opsional)</p>
                  </div>
          
                  <div class="col-span-full">
                    <label for="document" class="block text-sm font-medium leading-6 text-gray-900">Surat Permohonan <span class="text-red-500">*</span></label>
                    <input class="block w-full rounded-md border-0 p-6 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 " name="document" id="document" type="file" required>
                  
                  </div>

                  <div class="mx-auto col-span-full">
                    <div class="flex flex-row gap-x-4 h-6 items-center">
                      <input id="validasi" name="validasi" type="checkbox" required class="h-4 w-4 rounded border-gray-300 text-violet-700  focus:ring-violet-700">
                      <label for="validasi" class="text-sm font-medium text-gray-900 sm:text-xs">Saya Menyetujui Syarat & Ketentuan yang berlaku</label>
                    </div>
                    <div class="text-sm leading-6">
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- button -->

            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
              <button type="submit" class="rounded-full bg-violet-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
          </form>
    </section>
  <!-- FORM -->
@endsection