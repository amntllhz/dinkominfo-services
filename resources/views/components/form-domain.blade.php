<div class="pb-12">
  <h2 class="text-lg font-bold leading-7 text-primary">Data Pengajuan</h2>
  <p class="mt-1 text-sm leading-6 text-gray-600">Form dengan tanda ( <span class="text-red-500">*</span> ) wajib diisi</p></p>

  <div class="mt-10 grid grid-cols-6 sm:grid-cols-1 gap-x-6 gap-y-8 sm:gap-y-4">
      <div class="col-span-3 sm:col-span-1">
        <label for="app_name" class="block text-sm font-medium leading-6 text-gray-900">Nama Aplikasi <span class="text-red-500">*</span></label>
        <div class="mt-2">
          <input type="text" name="app_name" id="app_name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary ">
        </div>
      </div>

      <div class="col-span-3 sm:col-span-1">
          <label for="site" class="block text-sm font-medium leading-6 text-gray-900">Nama Domain <span class="text-red-500">*</span></label>
          <div class="mt-2">
            <input type="text" name="site" id="site" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary ">
          </div>
      </div>

      <div class="col-span-3 sm:col-span-1">
        <label for="ip" class="block text-sm font-medium leading-6 text-gray-900">IP Address (opsional)</label>
        <div class="mt-2">
          <input type="text" name="ip" id="ip" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary ">
        </div>
      </div>

    <div class="col-span-full">
      <label for="desc_name" class="block text-sm font-medium leading-6 text-gray-900">Deskripsi Singkat Aplikasi <span class="text-red-500">*</span></label>
      <div class="mt-2">
        <textarea id="desc_name" required name="desc_name" required rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary "></textarea>
      </div>
      <p class="mt-3 text-sm leading-6 text-gray-600">Tuliskan deskripsi singkat aplikasi</p>
    </div>

    <div class="col-span-full">
      <label for="add_inform" class="block text-sm font-medium leading-6 text-gray-900">Informasi Tambahan</label>
      <div class="mt-2">
        <textarea id="add_inform"  name="add_inform"  rows="3" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-primary "></textarea>
      </div>
      <p class="mt-3 text-sm leading-6 text-gray-600">Tuliskan tambahan informasi</p>
    </div>

    <div class="col-span-full">
      <label for="document" class="block text-sm font-medium leading-6 text-gray-900">Surat Permohonan <span class="text-red-500">*</span></label>      

      <input class="mt-2 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="document" name="document" type="file" required>

      <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, DOCX or DOC (MAX. 10MB).</p>

      @if ($errors->has('document'))
        <x-alert>{{ $errors->first('document') }}</x-alert>
      @endif
    
    </div>

    <div class="mx-auto col-span-full">
      <div class="flex flex-row gap-x-4 h-6 items-center">
        <input id="comments" name="comments" type="checkbox" required class="h-4 w-4 rounded border-gray-300 text-primary focus:ring-primary">
        <label for="comments" class="text-sm font-medium text-gray-900 sm:text-xs">Saya Menyetujui Syarat & Ketentuan yang berlaku</label>
      </div>
      <div class="text-sm leading-6">
        
      </div>
    </div>
  </div>
</div>