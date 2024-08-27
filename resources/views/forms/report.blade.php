@extends('layouts.form')

@section('title', 'Form Laporan')

@section('content')
<!-- FORM -->
    <section class="max-w-6xl mx-auto py-12 md:max-w-lg sm:max-w-xs">
        <div class="flex flex-col gap-y-2 text-center mb-10">
            <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-3xl">Form Laporan</h3>
            <p class="text-base leading-loose text-gray-500 sm:text-sm">Kemudahan Pengajuan yang juga dilengkapi dengan Panduan Penggunaan </p>
          </div>
          <form method="POST" action="{{ route('form.handlereport') }}" enctype="multipart/form-data" class="mx-auto max-w-4xl">
          @csrf
            <div class="space-y-12">
              
            <!-- applicant -->
              <x-applicant :instansi="$instansi">Pelapor</x-applicant>
              
            <!-- data -->
            <x-form-report :services="$services"></x-form-report>
              
              <!-- button -->

            <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
              <button type="submit" class="rounded-full bg-violet-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
            </div>
          </form>
    </section>
  <!-- FORM -->
@endsection
