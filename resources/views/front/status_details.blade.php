@extends('layouts.front')

@section('title', 'Detail Status')

@section('content')
    <section class="max-w-6xl mx-auto py-12 sm:max-w-xs md:max-w-lg">

        @if($details)
          <x-found-data :details="$details"></x-found-data>
        @else
          <x-no-data :receipt="$receipt"></x-no-data>
        @endif

          
    </section>
  {{-- <section class="max-w-6xl mx-auto py-12">
      <div class="flex flex-col gap-y-2 text-center mb-10">
          <h3 class="text-5xl text-indigo-950 font-clash font-bold">Periksa Status Pengajuan</h3>
          <p class="text-base leading-loose text-gray-500">Kemudahan Pengajuan yang juga dilengkapi dengan Panduan Penggunaan </p>
        </div>
        <div class="mx-auto max-w-4xl">
          <div class="space-y-12">
        @if($details)
            <x-found-data :details="$details"></x-found-data>
        @else
            <x-no-data :receipt="$receipt"></x-no-data>
  
        @endif
  </section> --}}
@endsection