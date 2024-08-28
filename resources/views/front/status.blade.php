@extends('layouts.front')

@section('title', 'Cek Status')

@section('content')
    <section class="max-w-6xl mx-auto py-12 sm:max-w-xs md:max-w-lg">
        <div class="flex flex-col gap-y-2 text-center mb-10">
            <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-3xl">Status Pengajuan</h3>
            <p class="text-base leading-loose text-gray-500 sm:text-sm">Kemudahan Pengajuan yang juga dilengkapi dengan Panduan Penggunaan </p>
          </div>
          <form method="POST" action="{{ route('front.status.details') }}" class="mx-auto max-w-4xl">
            @csrf
            <div class="space-y-12">
              
              <!-- user -->

              <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8">
                  <div class="col-span-1">
                    <label for="nama" class="block text-sm font-medium leading-6 text-gray-900">Resi Pengajuan <span class="text-red-500">*</span></label>
                    <div class="mt-2">
                      <input required type="text" name="receipt" id="receipt" placeholder="Masukan Resi Pengajuan" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-violet-700 ">
                    </div>
                  </div>
                </div>
              </div>

              <!-- user -->
          
              <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('front.index') }}" class="text-sm font-semibold text-gray-500 hover:text-gray-700">Kembali</a>
                <button type="submit" class="rounded-full bg-violet-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cek status</button>
              </div>
          </form>
    </section>
@endsection