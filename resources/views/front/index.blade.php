@extends('layouts.front')

@section('title', 'Beranda')

@section('content')

  <!-- hero -->
    <section class="max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
      <div class="flex flex-row justify-between items-center sm:flex-col sm:gap-y-4 md:flex-col">
        <div class="flex flex-col gap-y-6">

          <!-- badge -->

          <div class="small-badge w-fit gap-x-2 flex flex-row bg-white rounded-full py-2 px-4 sm:mx-auto sm:py-1 items-center md:mx-auto">
            <svg class="sm:w-4" width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.5 22.5C18.0228 22.5 22.5 18.0228 22.5 12.5C22.5 6.97715 18.0228 2.5 12.5 2.5C6.97715 2.5 2.5 6.97715 2.5 12.5C2.5 18.0228 6.97715 22.5 12.5 22.5Z" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M8.50001 3.5H9.50001C7.55001 9.34 7.55001 15.66 9.50001 21.5H8.50001" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M15.5 3.5C17.45 9.34 17.45 15.66 15.5 21.5" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.5 16.5V15.5C9.34 17.45 15.66 17.45 21.5 15.5V16.5" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.5 9.50001C9.34 7.55001 15.66 7.55001 21.5 9.50001" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p class="text-base font-semibold text-indigo-950 sm:text-xs md:text-sm">Dapat di akses secara Online 24 Jam</p>
          </div>

          <!-- HeadLine -->

          <div class="flex flex-col gap-y-2 sm:text-center md:text-center">
            <h1 class="font-clash text-6xl font-extrabold text-indigo-950 leading-none sm:text-4xl md:text-5xl">Portal Layanan<br>Digitalisasi OPD</h1>
            <p class="max-w-md text-base leading-loose text-gray-500 sm:text-xs sm:max-w-xs">Pengajuan Clearance, Server, Perangkat, serta Dukungan untuk Optimalisasi  Kinerja dan Efisiensi bagi OPD Kabupaten Pekalongan</p>
          </div>
          <a href="#features" class=" w-fit text-base bg-violet-700 text-white py-2 rounded-full font-semibold px-10 hover:bg-indigo-950 transition-all ease-in-out duration-300 sm:mx-auto md:mx-auto">Mulai</a>
        </div>
        <div class="flex flex-row items-center">
          <img src="../assets/hero-image-1.png" class="h-[480px] md:h-[400px] sm:h-[380px]" alt="hero-image">
        </div>
      </div>
    
    </section>
  <!-- hero -->

  <!-- services -->
    <section id="services" class="services max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
      <div class="gap-y-2 text-center">
        <h3 class="text-5xl text-indigo-950 font-clash font-bold mb-2 sm:text-4xl">Layanan Tersedia</h3>
        <p class="text-base leading-loose text-gray-500 mb-7 sm:text-xs sm:max-w-xs sm:mx-auto">Layanan digital terintegrasi untuk Pemerintah Daerah Kabupaten Pekalongan</p>
      </div>

      <div class="grid grid-cols-4 sm:grid-cols-1 gap-x-8 gap-y-6 md:grid-cols-2">
      @foreach ($services as $service)
        <div class="w-full flex flex-col gap-y-5 bg-white rounded-2xl p-6 sm:items-center sm:text-center sm:max-w-xs sm:mx-auto">
          <img src="{{ Storage::url($service->icon) }}" height="46px" width="46px" >
          <div class="flex flex-col">
            <h3 class="font-bold text-xl">{{ $service->name }}</h3>
            <p class="text-base leading-normal text-gray-500">{{ $service->description }}</p>
          </div>        
          <a href="{{ route('front.service.form', ['slug' => $service->slug]) }}" class="font-semibold text-violet-700 hover:bg-slate-200 p-2 w-fit rounded-md">Pengajuan</a>
        </div>
      @endforeach
      </div>
    </section>
  <!-- services -->

  <!-- report -->
    <section id="about" class="max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
      <div class="flex flex-row justify-between items-center sm:flex-col sm:gap-y-4 md:flex-col">

        <!-- image -->
        
        <div class="flex flex-row items-center w-full md:justify-center">
          <img src="../assets/hero-image-2.png" class="h-[480px] md:h-[400px] sm:h-[380px]" alt="hero-image">
        </div>
        <div class="flex flex-col gap-y-6 w-full ">

          <!-- badge -->

          <div class="small-badge w-fit gap-x-2 flex flex-row bg-white rounded-full py-2 px-4 sm:py-1 sm:items-center sm:mt-6 sm:mx-auto md:mx-auto md:mt-8">
            <svg class=" sm:w-5 " width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M12.5 22.5C18.0228 22.5 22.5 18.0228 22.5 12.5C22.5 6.97715 18.0228 2.5 12.5 2.5C6.97715 2.5 2.5 6.97715 2.5 12.5C2.5 18.0228 6.97715 22.5 12.5 22.5Z" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M8.50001 3.5H9.50001C7.55001 9.34 7.55001 15.66 9.50001 21.5H8.50001" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M15.5 3.5C17.45 9.34 17.45 15.66 15.5 21.5" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.5 16.5V15.5C9.34 17.45 15.66 17.45 21.5 15.5V16.5" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M3.5 9.50001C9.34 7.55001 15.66 7.55001 21.5 9.50001" stroke="#080C2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            <p class="text-base font-semibold text-indigo-950 sm:text-sm md:text-sm">Menampung Pengajuan 24 jam</p>
          </div>

          <!-- Headline -->
          
          <div class="flex flex-col gap-y-2 sm:text-center md:text-center">
            <h1 class="font-clash text-6xl font-extrabold text-indigo-950 leading-none sm:text-4xl md:text-4xl">Layanan Cepat<br>Laporkan Kendala</h1>
            <p class="text-base max-w-lg leading-loose text-gray-500 sm:text-xs sm:max-w-xs sm:mx-auto md:mx-auto">Laporkan kendala dan permasalahan mengenai layanan secara langsung dan mendapatkan respons cepat</p>

            <!-- Grid -->

            <div class="grid grid-cols-4 mt-4 sm:mx-auto sm:gap-x-6 sm:gap-y-6 md:mx-auto md:gap-x-6 sm:grid-cols-2 max-w-lg">

              <!-- services -->
      
              <div class="flex flex-col bg-white rounded-2xl p-7 w-fit sm:p-5 md:p-6">
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M22.7335 4.58079C23.6609 3.96278 24.748 3.6276 25.8624 3.61603C26.9768 3.60446 28.0705 3.917 29.0106 4.51562L36.9724 9.58329H40.2499C40.7582 9.58329 41.2458 9.78522 41.6052 10.1447C41.9647 10.5041 42.1666 10.9916 42.1666 11.5V28.75C42.1666 29.2583 41.9647 29.7458 41.6052 30.1052C41.2458 30.4647 40.7582 30.6666 40.2499 30.6666H37.3366C37.3981 31.5999 37.2006 32.5321 36.766 33.3604C36.3314 34.1886 35.6766 34.8808 34.8737 35.3605L25.1121 41.2179C24.5123 41.5775 23.8255 41.7661 23.1262 41.7634C22.4269 41.7607 21.7416 41.5668 21.1446 41.2025C20.4721 41.7967 19.6126 42.1361 18.7156 42.1617C17.8187 42.1872 16.9412 41.8973 16.236 41.3425L6.38434 33.601C5.69569 33.0607 5.21272 32.3009 5.01571 31.448C4.8187 30.5951 4.91952 29.7005 5.30142 28.9129C4.84373 28.554 4.4737 28.0958 4.21933 27.5727C3.96497 27.0497 3.83294 26.4757 3.83325 25.8941V11.5C3.83325 10.9916 4.03519 10.5041 4.39463 10.1447C4.75408 9.78522 5.24159 9.58329 5.74992 9.58329H15.2317L22.7335 4.58079ZM7.99817 26.1548L9.3245 24.9952C10.458 24.0037 11.9352 23.4964 13.4387 23.5825C14.9422 23.6685 16.3519 24.3409 17.3649 25.4552L22.5438 31.1515C23.3559 32.0448 23.8662 33.1711 24.0025 34.3707C24.1387 35.5703 23.8939 36.7823 23.3028 37.835L32.9033 32.0754C33.1536 31.9236 33.3435 31.6897 33.4407 31.4136C33.5378 31.1375 33.5362 30.8363 33.4362 30.5612L24.9511 18.6817C24.7187 18.3561 24.3903 18.1114 24.0119 17.9818C23.6335 17.8522 23.224 17.8443 22.8408 17.9591L18.076 19.387C17.0817 19.6853 16.0251 19.7088 15.0185 19.455C14.0119 19.2012 13.0927 18.6797 12.3586 17.9457L11.797 17.386C11.2877 16.8768 10.9321 16.2343 10.7711 15.5322C10.6101 14.8302 10.6501 14.097 10.8866 13.4166H7.66659V25.8941L7.99817 26.1548ZM26.954 7.75095C26.6403 7.55107 26.2751 7.44681 25.9031 7.45089C25.5311 7.45498 25.1684 7.56723 24.8591 7.77395L14.5091 14.674L15.0688 15.2355C15.3137 15.4802 15.6204 15.6539 15.9562 15.7383C16.2919 15.8227 16.6443 15.8145 16.9758 15.7147L21.7388 14.2868C22.888 13.9421 24.1163 13.9657 25.2516 14.3541C26.3868 14.7424 27.3722 15.4762 28.0695 16.4526L35.487 26.8333H38.3333V13.4166H36.9743C36.2451 13.4165 35.531 13.2084 34.9158 12.8167L26.954 7.75095ZM11.8468 27.8779L8.7495 30.588L18.6012 38.3295L19.9524 35.9681C20.1532 35.6164 20.2374 35.2102 20.193 34.8076C20.1486 34.4051 19.9778 34.027 19.7052 33.7275L14.5283 28.0312C14.1906 27.66 13.7208 27.4359 13.2198 27.4073C12.7188 27.3786 12.2246 27.5476 11.8468 27.8779Z" fill="#640EF1"/>
                </svg>                                 
              </div>

              <!-- rute -->
      
              <div class="flex flex-col bg-white rounded-2xl p-7 w-fit sm:p-5 md:p-6">
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M24.9004 16.3678V31.5249C24.9004 33.0324 24.2999 34.4781 23.231 35.544C22.162 36.61 20.7123 37.2088 19.2006 37.2088H15.0777C14.6294 38.4735 13.7473 39.5394 12.5872 40.2182C11.4271 40.897 10.0636 41.1449 8.73791 40.9182C7.41219 40.6914 6.20954 40.0046 5.34253 38.9791C4.47553 37.9536 4 36.6555 4 35.3142C4 33.9729 4.47553 32.6747 5.34253 31.6493C6.20954 30.6238 7.41219 29.9369 8.73791 29.7102C10.0636 29.4835 11.4271 29.7314 12.5872 30.4102C13.7473 31.089 14.6294 32.1549 15.0777 33.4195H19.2006C19.7045 33.4195 20.1877 33.2199 20.544 32.8646C20.9003 32.5093 21.1005 32.0274 21.1005 31.5249V16.3678C21.1005 14.8604 21.701 13.4146 22.77 12.3487C23.8389 11.2827 25.2887 10.6839 26.8004 10.6839H32.5002V5L42 12.5785L32.5002 20.1571V14.4732H26.8004C26.2965 14.4732 25.8132 14.6728 25.4569 15.0281C25.1006 15.3834 24.9004 15.8653 24.9004 16.3678ZM9.70079 37.2088C10.2047 37.2088 10.6879 37.0092 11.0443 36.6539C11.4006 36.2986 11.6007 35.8167 11.6007 35.3142C11.6007 34.8117 11.4006 34.3298 11.0443 33.9745C10.6879 33.6192 10.2047 33.4195 9.70079 33.4195C9.19689 33.4195 8.71363 33.6192 8.35732 33.9745C8.00101 34.3298 7.80083 34.8117 7.80083 35.3142C7.80083 35.8167 8.00101 36.2986 8.35732 36.6539C8.71363 37.0092 9.19689 37.2088 9.70079 37.2088Z" fill="#640EF1"/>
                  </svg>
                  
                  
              </div>

              <!-- fast -->
      
              <div class="flex flex-col bg-white rounded-2xl p-7 w-fit sm:p-5 md:p-6">
                <svg width="46" height="46" viewBox="0 0 46 46" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M42.1667 10.5417H17.25C15.1417 10.5417 13.4167 12.2667 13.4167 14.3751V31.6251C13.4167 32.6417 13.8205 33.6168 14.5394 34.3357C15.2583 35.0545 16.2333 35.4584 17.25 35.4584H42.1667C44.2942 35.4584 46 33.7526 46 31.6251V14.3751C46 13.3584 45.5961 12.3834 44.8772 11.6645C44.1584 10.9456 43.1833 10.5417 42.1667 10.5417ZM42.1667 31.6251H17.25V17.5759L29.7083 23.9584L42.1667 17.5759V31.6251ZM29.7083 20.7192L17.25 14.3751H42.1667L29.7083 20.7192ZM9.58333 31.6251C9.58333 31.9509 9.64083 32.2576 9.67917 32.5834H1.91667C0.858667 32.5834 0 31.7209 0 30.6667C0 29.6126 0.858667 28.7501 1.91667 28.7501H9.58333V31.6251ZM5.75 13.4167H9.67917C9.64083 13.7426 9.58333 14.0492 9.58333 14.3751V17.2501H5.75C4.69583 17.2501 3.83333 16.3876 3.83333 15.3334C3.83333 14.2792 4.69583 13.4167 5.75 13.4167ZM1.91667 23.0001C1.91667 21.9459 2.77917 21.0834 3.83333 21.0834H9.58333V24.9167H3.83333C2.77917 24.9167 1.91667 24.0542 1.91667 23.0001Z" fill="#640EF1"/>
                  </svg>
                  
              </div>

              <!-- secure -->
      
              <div class="flex flex-col bg-white rounded-2xl p-7 w-fit sm:p-5 md:p-6">
                <svg width="38" height="34" viewBox="0 0 38 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M35.9 23.8V21.25C35.7633 20.0806 35.1882 19.001 34.2845 18.2171C33.3807 17.4333 32.2116 17 31 17C29.7884 17 28.6193 17.4333 27.7155 18.2171C26.8118 19.001 26.2367 20.0806 26.1 21.25V23.8C25.5552 23.8358 25.0422 24.0622 24.6561 24.4373C24.2699 24.8124 24.0369 25.3107 24 25.84V31.79C24.0024 32.3467 24.2192 32.8823 24.6079 33.2914C24.9966 33.7005 25.529 33.9533 26.1 34H35.725C36.2981 33.9977 36.8495 33.787 37.2706 33.4094C37.6916 33.0318 37.9519 32.5147 38 31.96V26.01C37.9976 25.4533 37.7808 24.9177 37.3921 24.5086C37.0034 24.0995 36.471 23.8467 35.9 23.8ZM28.375 21.25C28.3913 20.9352 28.473 20.6268 28.6152 20.3434C28.7574 20.0601 28.9571 19.8076 29.2023 19.6011C29.4475 19.3947 29.7332 19.2385 30.0421 19.1421C30.3511 19.0457 30.6769 19.0109 31 19.04C31.3231 19.0109 31.6489 19.0457 31.9579 19.1421C32.2668 19.2385 32.5525 19.3947 32.7977 19.6011C33.0429 19.8076 33.2426 20.0601 33.3848 20.3434C33.527 20.6268 33.6087 20.9352 33.625 21.25V23.8H28.375V21.25Z" fill="#640EF1"/>
                  <path d="M38 17V3.09091C38 2.27115 37.6664 1.48496 37.0725 0.905306C36.4786 0.325648 35.6732 0 34.8333 0L3.16667 0C2.32681 0 1.52136 0.325648 0.927495 0.905306C0.33363 1.48496 0 2.27115 0 3.09091L0 30.9091C0 31.7289 0.33363 32.515 0.927495 33.0947C1.52136 33.6744 2.32681 34 3.16667 34H20.5833V30.9091H3.16667V3.09091H34.8333V17" fill="#640EF1"/>
                  <path d="M9 6H6V9.14286H9V6ZM30 6H12V9.14286H30V6ZM19.5 24.8571H12V28H19.5V24.8571ZM9 24.8571H6V28H9V24.8571ZM15 12.2857H12V15.4286H15V12.2857ZM30 12.2857H18V15.4286H30V12.2857ZM22.212 18.5714H18V21.7143H21.3V20.9286C21.3158 20.0518 21.6407 19.2122 22.212 18.5714ZM15 18.5714H12V21.7143H15V18.5714Z" fill="#640EF1"/>
                  </svg>
                                                                                                    
              </div>

            </div>
          </div>
          <a href="{{ route('form.report') }}" class="sm:mx-auto md:mx-auto md:mt-4 w-fit text-base bg-violet-700 text-white py-2 rounded-full font-semibold px-10 hover:bg-indigo-950 transition-all ease-in-out duration-300">Laporkan</a>
        </div>
        
      </div>
    </section>
  <!-- report -->

  <!-- guide -->
    <section class=" max-w-6xl mx-auto py-12 sm:max-w-sm md:max-w-2xl">
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
    </section>
  <!-- guide --> 

@endsection