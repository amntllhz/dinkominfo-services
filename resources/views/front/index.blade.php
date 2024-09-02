@extends('layouts.front')

@section('title', 'Beranda')

@section('content')

  <!-- hero -->
    <x-hero></x-hero>
  <!-- hero -->

  <!-- services -->
    <x-services :services="$services"></x-services>
  <!-- services -->

  <!-- report -->
    <x-report></x-report>
  <!-- report -->
  
  <!-- guide -->
    {{-- <section class=" max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
      <div class="flex flex-col gap-y-8">

        <!-- Headline -->

        <div class="flex flex-col gap-y-2 text-center">
          <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-4xl">Panduan Layanan</h3>
          <p class="text-base leading-loose text-gray-500 sm:text-xs">Kemudahan Pengajuan yang juga dilengkapi dengan Panduan Penggunaan </p>
        </div>

        <!-- Card -->
        
        <div class="flex flex-warp gap-x-8 justify-center sm:flex-col sm:gap-y-8 sm:mx-auto md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-8">
          <div class="group relative">
            <div class="opacity-0 absolute flex justify-center w-full bottom-8 group-hover:opacity-100 transition-all ease-in-out duration-300">
              <a href="#" class="font-semibold bg-violet-700 text-white px-7 py-3 shadow-violet-700 rounded-full hover:bg-indigo-950 transition-all ease-in-out duration-300">View Detail</a>
            </div>
            <img src="../assets/guide-1.png" alt="" class="group-hover:border-4 transition-all ease-in-out duration-120 border-violet-700 rounded-2xl w-[320px] h-[220px]"> 
          </div>
          <div class="group relative">
            <div class="opacity-0 absolute flex justify-center w-full bottom-8 group-hover:opacity-100 transition-all ease-in-out duration-300">
              <a href="#" class="font-semibold bg-violet-700 text-white px-7 py-3 shadow-violet-700 rounded-full hover:bg-indigo-950 transition-all ease-in-out duration-300">View Detail</a>
            </div>
            <img src="../assets/guide-1.png" alt="" class="group-hover:border-4 transition-all ease-in-out duration-120 border-violet-700 rounded-2xl w-[320px] h-[220px]"> 
          </div>
          <div class="group relative">
            <div class="opacity-0 absolute flex justify-center w-full bottom-8 group-hover:opacity-100 transition-all ease-in-out duration-300">
              <a href="#" class="font-semibold bg-violet-700 text-white px-7 py-3 shadow-violet-700 rounded-full hover:bg-indigo-950 transition-all ease-in-out duration-300">View Detail</a>
            </div>
            <img src="../assets/guide-1.png" alt="" class="group-hover:border-4 transition-all ease-in-out duration-120 border-violet-700 rounded-2xl w-[320px] h-[220px]"> 
          </div>
          <div class="group relative">
            <div class="opacity-0 absolute flex justify-center w-full bottom-8 group-hover:opacity-100 transition-all ease-in-out duration-300">
              <a href="#" class="font-semibold bg-violet-700 text-white px-7 py-3 shadow-violet-700 rounded-full hover:bg-indigo-950 transition-all ease-in-out duration-300">View Detail</a>
            </div>
            <img src="../assets/guide-1.png" alt="" class="group-hover:border-4 transition-all ease-in-out duration-120 border-violet-700 rounded-2xl w-[320px] h-[220px]"> 
          </div>
        </div>
      </div>
    </section> --}}
  <!-- guide --> 

  <!-- accordion -->
    <x-accordion :questions="$questions" :answers="$answers" />
  <!-- accordion --> 

@endsection

