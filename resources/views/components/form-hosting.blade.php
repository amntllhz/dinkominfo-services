              <div class="pb-12">
                <h2 class="text-lg font-bold leading-7 text-violet-700">Data Pengajuan</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">Form dengan tanda ( <span class="text-red-500">*</span> ) wajib diisi</p></p>
          
                <div class="mt-10 grid grid-cols-6 sm:grid-cols-1 gap-x-6 gap-y-8 sm:gap-y-4">
                    <div class="col-span-3 sm:col-span-1">
                      <label for="cpu" class="block text-sm font-medium leading-6 text-gray-900">CPU <span class="text-red-500">*</span></label>
                      <div class="mt-2">
                        <input type="text" name="cpu" id="cpu" placeholder="Masukkan jumlah core CPU" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                      </div>
                    </div>

                    <div class="col-span-3 sm:col-span-1">
                        <label for="ram" class="block text-sm font-medium leading-6 text-gray-900">RAM<span class="text-red-500">*</span></label>
                        <div class="mt-2">
                          <input type="text" name="ram" id="ram" placeholder="Masukkan jumlah ukuran RAM" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                        </div>
                    </div>
                    
                    <div class="col-span-3 sm:col-span-1">
                      <label for="storage" class="block text-sm font-medium leading-6 text-gray-900">Storage <span class="text-red-500">*</span></label>
                      <div class="mt-2">
                        <input type="text" name="storage" id="storage" placeholder="Masukkan jumlah ukuran Storage" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
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
                    {{-- <input class="block w-full rounded-md border-0 p-6 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 " name="document" id="document" type="file" required> --}}
                    
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="document" name="document" type="file" required>

                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PDF, DOCX or DOC (MAX. 10MB).</p>
                  
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