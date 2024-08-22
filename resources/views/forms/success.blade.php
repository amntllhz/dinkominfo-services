<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    {{-- <link rel="stylesheet" href="{{ asset('output.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://api.fontshare.com/v2/css?f[]=clash-display@200,300,400,500,600,700,1&display=swap" rel="stylesheet">
    <script src="{{ asset('scripts.js') }}" defer></script>
</head>
<body class="bg-back">

    <!-- navbar -->
     <nav class="flex mx-auto max-w-6xl mt-10">
        <ul class="flex flex-row justify-between gap-x-10 mx-auto">
          <li>
            <a href="{{ route('front.index') }}" class="text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Beranda</a>
          </li>
          <li>
            <a href="{{ route('front.status') }}" class="text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Cek Status</a>
          </li>
          <li>
            <a href="#about" class="text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Tentang</a>
          </li>
        </ul>
     </nav>
    <!-- navbar -->

    <!-- FORM -->
    
    {{-- <section class="max-w-6xl mx-auto py-12">
          <div class="mx-auto max-w-md">
            <div class="space-y-12">
              
              <!-- user -->

              <div class="flex flex-col gap-y-5 bg-white rounded-2xl p-6">
                <div class="mx-auto">
                  <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.5701 52.0598L17.25 37.7363L22.0222 32.964L31.5701 42.5085L50.6591 23.4161L55.4347 28.1918L31.5701 52.0598Z" fill="#640EF1"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.375 37.5C0.375 16.9969 16.9969 0.375 37.5 0.375C58.0031 0.375 74.625 16.9969 74.625 37.5C74.625 58.0031 58.0031 74.625 37.5 74.625C16.9969 74.625 0.375 58.0031 0.375 37.5ZM37.5 67.875C33.5111 67.875 29.5613 67.0893 25.876 65.5628C22.1907 64.0364 18.8422 61.7989 16.0216 58.9784C13.2011 56.1578 10.9636 52.8093 9.43716 49.124C7.91067 45.4387 7.125 41.4889 7.125 37.5C7.125 33.5111 7.91067 29.5613 9.43716 25.876C10.9636 22.1907 13.2011 18.8422 16.0216 16.0216C18.8422 13.2011 22.1907 10.9636 25.876 9.43716C29.5613 7.91067 33.5111 7.125 37.5 7.125C45.556 7.125 53.2819 10.3252 58.9784 16.0216C64.6748 21.718 67.875 29.444 67.875 37.5C67.875 45.556 64.6748 53.2819 58.9784 58.9784C53.2819 64.6748 45.556 67.875 37.5 67.875Z" fill="#640EF1"/>
                  </svg>   
                </div>               
                  
                <div class="flex flex-col gap-y-1 text-center">
                  <h3 class="font-bold text-lg text-violet-700">Pengajuan Berhasil</h3>
                  <p class="text-sm font-semibold leading-normal text-indigo-950">Pengajuan {{ $submission->service->name }}</p>
                  <p class="text-sm leading-normal text-gray-500">No Resi : {{ $submission->receipt }}</p>

                  <p class="text-sm leading-normal text-gray-500">Status : {{ $submission->status }}</p>
                </div>
                <div class="mt-2 flex items-center justify-center gap-x-6">
                  <a href="{{ route('front.index') }}">
                      <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Beranda</button>
                  </a>
                  <a href="{{ route('front.status') }}">
                      <button type="submit" class="rounded-full bg-violet-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cek status</button>
                    </a>
                </div>
              </div>       
          </div>
    </section> --}}

        <section class="max-w-6xl mx-auto py-12 sm:max-w-xs">
          <div class="mx-auto max-w-md">
            <div class="space-y-12">
              
              <!-- user -->

              <div class="flex flex-col gap-y-5 bg-white rounded-2xl p-6">
                <div class="mx-auto mt-4">                  
                  <svg width="185" height="124" viewBox="0 0 185 124" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M44.75 27C47.6375 27 50 24.57 50 21.6C50 18.63 47.6375 16.2 44.75 16.2H44.4875C44.4875 15.39 44.75 14.58 44.75 13.5C44.75 7.56 40.025 2.7 34.25 2.7C32.15 2.7 30.3125 3.24 28.475 4.32C27.6875 1.89 25.325 0 22.4375 0C18.7625 0 15.875 2.97 15.875 6.75C15.875 8.37 16.4 9.72 17.45 11.07C16.925 10.8 16.4 10.8 15.875 10.8C11.4125 10.8 8 14.31 8 18.9C8 23.49 11.4125 27 15.875 27H44.75Z" fill="#EDE0FF"/>
                    <path d="M27.125 97C29.2563 97 31 95.2 31 93C31 90.8 29.2563 89 27.125 89H26.9312C26.9312 88.4 27.125 87.8 27.125 87C27.125 82.6 23.6375 79 19.375 79C17.825 79 16.4688 79.4 15.1125 80.2C14.5313 78.4 12.7875 77 10.6562 77C7.94375 77 5.8125 79.2 5.8125 82C5.8125 83.2 6.2 84.2 6.975 85.2C6.5875 85 6.2 85 5.8125 85C2.51875 85 0 87.6 0 91C0 94.4 2.51875 97 5.8125 97H27.125Z" fill="#EDE0FF"/>
                    <path d="M177.75 37C180.638 37 183 34.57 183 31.6C183 28.63 180.638 26.2 177.75 26.2H177.487C177.487 25.39 177.75 24.58 177.75 23.5C177.75 17.56 173.025 12.7 167.25 12.7C165.15 12.7 163.313 13.24 161.475 14.32C160.688 11.89 158.325 10 155.438 10C151.763 10 148.875 12.97 148.875 16.75C148.875 18.37 149.4 19.72 150.45 21.07C149.925 20.8 149.4 20.8 148.875 20.8C144.412 20.8 141 24.31 141 28.9C141 33.49 144.412 37 148.875 37H177.75Z" fill="#EDE0FF"/>
                    <path d="M78.2786 81.6752L57.0344 60.426L64.1141 53.3463L78.2786 67.5057L106.597 39.1819L113.682 46.2666L78.2786 81.6752Z" fill="#640EF1"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M32 60.0756C32 29.6588 56.6588 5 87.0756 5C117.492 5 142.151 29.6588 142.151 60.0756C142.151 90.4923 117.492 115.151 87.0756 115.151C56.6588 115.151 32 90.4923 32 60.0756ZM87.0756 105.137C81.158 105.137 75.2983 103.972 69.8311 101.707C64.364 99.4427 59.3964 96.1234 55.212 91.9391C51.0277 87.7547 47.7084 82.7871 45.4439 77.32C43.1793 71.8528 42.0137 65.9932 42.0137 60.0756C42.0137 54.158 43.1793 48.2983 45.4439 42.8311C47.7084 37.364 51.0277 32.3964 55.212 28.212C59.3964 24.0277 64.364 20.7084 69.8311 18.4439C75.2983 16.1793 81.158 15.0137 87.0756 15.0137C99.0267 15.0137 110.488 19.7613 118.939 28.212C127.39 36.6628 132.137 48.1244 132.137 60.0756C132.137 72.0267 127.39 83.4883 118.939 91.9391C110.488 100.39 99.0267 105.137 87.0756 105.137Z" fill="#640EF1"/>
                    <path d="M172.375 124C179.319 124 185 118.24 185 111.2C185 104.16 179.319 98.4 172.375 98.4H171.744C171.744 96.48 172.375 94.56 172.375 92C172.375 77.92 161.013 66.4 147.125 66.4C142.075 66.4 137.656 67.68 133.238 70.24C131.344 64.48 125.663 60 118.719 60C109.881 60 102.938 67.04 102.938 76C102.938 79.84 104.2 83.04 106.725 86.24C105.462 85.6 104.2 85.6 102.938 85.6C92.2062 85.6 84 93.92 84 104.8C84 115.68 92.2062 124 102.938 124H172.375Z" fill="#EDE0FF"/>
                  </svg>                    
                                                                                                                                                        
                </div>               
                  
                <div class="flex flex-col gap-y-1 text-center">
                  <h3 class="font-clash font-semibold text-2xl text-indigo-950">Pengajuan Terkirim</h3>
                  <p class="text-sm font-semibold leading-normal text-violet-700 mb-1">Pengajuan {{ $submission->service->name }}</p>
                  <hr>
                  <p class="text-sm font-semibold leading-normal text-violet-700 mb-1">No. Resi</p>
                  <div class="mx-auto flex flex-row gap-x-2 items-center">
                  <div class="mx-auto flex flex-row gap-x-2 items-center">
                    <p id="resi-text" class="text-sm leading-normal bg-slate-100 text-gray-500 px-4 py-2 w-fit rounded-md">{{ $submission->receipt }}</p>                    
                    <a href="" id="copy-button" class="flex items-center bg-slate-100 px-2 rounded-md py-2">

                      <!-- icon awal -->

                      <svg id="copy-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.99805 16H11.998M7.99805 11H15.998" stroke="#6B7280" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M7.5 3.5C5.9442 3.54667 5.01661 3.71984 4.37477 4.36227C3.49609 5.24177 3.49609 6.6573 3.49609 9.48836V15.9944C3.49609 18.8255 3.49609 20.241 4.37477 21.1205C5.25345 22 6.66767 22 9.49609 22H14.4961C17.3245 22 18.7387 22 19.6174 21.1205C20.4961 20.241 20.4961 18.8255 20.4961 15.9944V9.48836C20.4961 6.6573 20.4961 5.24177 19.6174 4.36228C18.9756 3.71984 18.048 3.54667 16.4922 3.5" stroke="#6B7280" stroke-width="1.5"/>
                        <path d="M7.49609 3.75C7.49609 2.7835 8.2796 2 9.24609 2H14.7461C15.7126 2 16.4961 2.7835 16.4961 3.75C16.4961 4.7165 15.7126 5.5 14.7461 5.5H9.24609C8.2796 5.5 7.49609 4.7165 7.49609 3.75Z" stroke="#6B7280" stroke-width="1.5" stroke-linejoin="round"/>
                      </svg>                                      
                                                                                                                                   
                      <!-- icon akhir -->                                           
                      
                      <svg id="checked-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <path d="M7.99805 16H11.998M7.99805 11H15.998" stroke="#640EF1" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M7.5 3.5C5.9442 3.54667 5.01661 3.71984 4.37477 4.36227C3.49609 5.24177 3.49609 6.6573 3.49609 9.48836V15.9944C3.49609 18.8255 3.49609 20.241 4.37477 21.1205C5.25345 22 6.66767 22 9.49609 22H14.4961C17.3245 22 18.7387 22 19.6174 21.1205C20.4961 20.241 20.4961 18.8255 20.4961 15.9944V9.48836C20.4961 6.6573 20.4961 5.24177 19.6174 4.36228C18.9756 3.71984 18.048 3.54667 16.4922 3.5" stroke="#640EF1" stroke-width="1.5"/>
                        <path d="M7.49609 3.75C7.49609 2.7835 8.2796 2 9.24609 2H14.7461C15.7126 2 16.4961 2.7835 16.4961 3.75C16.4961 4.7165 15.7126 5.5 14.7461 5.5H9.24609C8.2796 5.5 7.49609 4.7165 7.49609 3.75Z" stroke="#640EF1" stroke-width="1.5" stroke-linejoin="round"/>
                      </svg>
                        
                      
                    </a>
                  </div>

                </div>

                <div class="mt-2 flex items-center justify-center gap-x-6">
                  <a href="{{ route('front.index') }}">
                    <button class="text-sm font-semibold leading-6 text-gray-900">Beranda</button>
                  </a>
                  <a href="{{ route('front.status') }}">
                    <button class="rounded-full bg-violet-700 px-5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Cek status</button>
                  </a>
                </div>
              </div>       
          </div>
  </section>



    <!-- FORM -->

    <!-- footer -->
     <section class="w-screen bg-[#070C29] mt-10 p-8">
      <div class="max-w-6xl mx-auto py-10 grid grid-cols-5 gap-x-10 sm:max-w-sm sm:grid-cols-1 sm:gap-y-8">

        <!-- company -->

        <div class=" flex flex-col col-span-2 gap-y-7 sm:col-span-1">
          <svg width="179" height="42" viewBox="0 0 179 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g clip-path="url(#clip0_398_102)">
            <path d="M6.94377 26.5092L6.42839 25.7757C5.37484 24.2805 4.62388 22.5938 4.21779 20.8105C3.72872 18.6576 3.74732 16.4205 4.27209 14.2761L4.35196 13.9567L4.61391 13.7523C6.85927 12.0001 9.42848 10.7082 12.1742 9.95064C15.9906 8.90024 20.02 8.90024 23.8363 9.95064C26.5802 10.7088 29.1476 12.0007 31.3914 13.7523L31.6533 13.9567L31.7332 14.2761C32.2579 16.4205 32.2765 18.6576 31.7875 20.8105C31.3814 22.5938 30.6304 24.2805 29.5769 25.7757L29.0615 26.5092L28.2948 26.044C25.1915 24.1657 21.633 23.1728 18.0053 23.1728C14.3776 23.1728 10.8191 24.1657 7.71578 26.044L6.94377 26.5092ZM18 21.264C21.6634 21.2578 25.2688 22.1789 28.4801 23.9414C29.1439 22.8395 29.6277 21.6389 29.9134 20.3846C30.3105 18.6335 30.3199 16.8168 29.941 15.0617C27.961 13.5656 25.716 12.4571 23.3242 11.7945C19.8423 10.8364 16.1662 10.8364 12.6843 11.7945C10.2914 12.455 8.04491 13.5617 6.06315 15.0564C5.6841 16.8115 5.69355 18.6282 6.09083 20.3793C6.37626 21.6339 6.8601 22.835 7.5241 23.9372C10.7349 22.1777 14.3385 21.2581 18 21.264Z" fill="#640EF1"/>
            <path d="M6.94374 26.5093L6.42835 25.7758C5.3748 24.2806 4.62385 22.5939 4.21775 20.8106L4.08252 20.2187L4.56063 19.8439C8.39523 16.8381 13.1272 15.2046 17.9999 15.2046C22.8727 15.2046 27.6046 16.8381 31.4392 19.8439L31.9174 20.2187L31.7821 20.8106C31.376 22.5939 30.6251 24.2806 29.5715 25.7758L29.0561 26.5093L28.2895 26.0441C25.1861 24.1658 21.6276 23.1729 17.9999 23.1729C14.3722 23.1729 10.8138 24.1658 7.71042 26.0441L6.94374 26.5093ZM17.9999 21.2641C21.6634 21.2579 25.2687 22.179 28.4801 23.9415C29.0373 23.0151 29.4671 22.0178 29.7579 20.9766C26.3479 18.4719 22.2271 17.1211 17.9957 17.1211C13.7643 17.1211 9.64345 18.4719 6.23349 20.9766C6.52424 22.0178 6.95405 23.0151 7.51129 23.9415C10.7255 22.1784 14.3337 21.2574 17.9999 21.2641Z" fill="#640EF1"/>
            <path d="M12.2104 6.0799L15.8224 3.77827C16.4642 3.34057 17.2231 3.10645 18 3.10645C18.7769 3.10645 19.5357 3.34057 20.1776 3.77827L23.7884 6.0799L19.5397 5.5359C18.5172 5.40814 17.4827 5.40814 16.4602 5.5359L12.2104 6.0799Z" fill="#640EF1"/>
            <path d="M19.0299 39.0001L18.0002 38.9926L16.9705 39.0001L16.9769 38.9639C14.5551 38.8339 12.1856 38.2101 10.0139 37.1307C6.55988 35.4099 3.74364 32.6342 1.97332 29.2059C1.7742 28.8163 1.58466 28.4117 1.41109 28.0019C0.477458 25.7843 -0.000895754 23.4018 0.00443866 20.9958C0.00440038 20.2005 0.0563329 19.4061 0.159905 18.6176C0.73769 14.2954 2.8653 10.3299 6.14738 7.45792C9.42946 4.58598 13.6428 3.00293 18.0044 3.00293C22.3661 3.00293 26.5794 4.58598 29.8615 7.45792C33.1436 10.3299 35.2712 14.2954 35.849 18.6176C35.9497 19.4063 35.9988 20.2007 35.9959 20.9958C35.9963 22.241 35.8678 23.4829 35.6126 24.7017C35.3762 25.8325 35.0307 26.9378 34.5808 28.0019C34.4072 28.4128 34.2176 28.8173 34.0185 29.2059C32.2505 32.633 29.4374 35.4085 25.9865 37.1307C23.8161 38.2095 21.448 38.8333 19.0277 38.9639L19.0299 39.0001ZM25.0771 29.8915L25.0324 29.9171L24.9834 29.9458C22.2767 31.5003 20.2671 34.0309 19.3664 37.0189C21.3736 36.8546 23.3312 36.3098 25.1346 35.4135C28.2218 33.8755 30.7386 31.3943 32.3201 28.3298C32.499 27.9827 32.6683 27.6207 32.8238 27.2535C33.2252 26.3044 33.5333 25.3186 33.7438 24.3099C33.9696 23.2197 34.082 22.1091 34.0792 20.9958C34.0792 20.2838 34.0327 19.5726 33.9397 18.8667C33.5343 15.8023 32.2473 12.9216 30.2352 10.5746C31.4789 12.7271 32.133 15.1693 32.1316 17.6552C32.1318 18.7165 32.0133 19.7746 31.7781 20.8095C31.372 22.5928 30.6211 24.2796 29.5675 25.7748C28.3864 27.4515 26.8568 28.8532 25.0835 29.8841L25.0771 29.8915ZM5.76095 10.5757C3.74901 12.9223 2.46204 15.8026 2.05638 18.8667C1.81743 20.6788 1.88583 22.5183 2.2587 24.3078C2.46993 25.3175 2.77876 26.3044 3.18085 27.2545C3.33525 27.6197 3.5003 27.9816 3.68345 28.3298C5.26429 31.3937 7.77992 33.8748 10.8658 35.4135C12.6682 36.3094 14.6247 36.8542 16.6308 37.0189C15.7318 34.0336 13.7253 31.5047 11.0223 29.9501L11.0117 29.9447L10.9648 29.9171L10.9105 29.8851C10.3873 29.5809 9.88432 29.2431 9.40482 28.8738C8.26161 27.998 7.2584 26.9534 6.42966 25.7758C5.37554 24.2804 4.62421 22.5933 4.218 20.8095C3.72893 18.6567 3.74753 16.4196 4.2723 14.2751C4.58995 12.9774 5.09122 11.7317 5.76095 10.5757ZM11.9221 28.2552L11.9902 28.2946C14.6955 29.8527 16.8087 32.2623 18.0002 35.1474C19.1935 32.2604 21.3089 29.8493 24.0165 28.2904L24.0761 28.2563L24.1049 28.2371L24.14 28.2201C26.349 26.9366 28.1001 24.9932 29.1471 22.6632C30.1941 20.3332 30.4844 17.7337 29.977 15.2302C29.4697 12.7267 28.1903 10.4451 26.3188 8.70622C24.4472 6.96734 22.0776 5.85862 19.5431 5.53594L19.3302 5.50932L19.1481 5.39328C18.3665 4.89506 17.6371 4.89506 16.8544 5.39328L16.6723 5.50932L16.4594 5.53594C14.7675 5.7531 13.1398 6.32158 11.6807 7.20486C10.2216 8.08814 8.96339 9.2667 7.98683 10.6649C7.01027 12.0631 6.33695 13.65 6.0101 15.3237C5.68325 16.9974 5.7101 18.721 6.08892 20.3837C6.43941 21.9248 7.0884 23.3823 7.99923 24.674C9.02424 26.1295 10.3537 27.3446 11.8955 28.235L11.9221 28.2552Z" fill="#640EF1"/>
            <path d="M9.07251 25.2254L9.16621 23.702C9.29612 21.5507 9.53495 19.4075 9.88178 17.2804C10.2981 14.7754 10.8487 12.5142 11.5184 10.5607C12.6759 7.17641 14.1667 4.83113 15.8236 3.77719C16.4653 3.33986 17.224 3.10596 18.0006 3.10596C18.7773 3.10596 19.5359 3.33986 20.1777 3.77719C21.8335 4.83113 23.3243 7.17641 24.4818 10.5629C25.1515 12.5164 25.7021 14.7765 26.1184 17.2825C26.4666 19.4088 26.7069 21.5514 26.8382 23.702L26.932 25.2254L25.5189 24.6484C20.7005 22.691 15.3082 22.691 10.4898 24.6484L9.07251 25.2254ZM18.0001 21.2641C20.3151 21.2602 22.6158 21.6264 24.8151 22.3489C24.6777 20.7073 24.4807 19.1125 24.2294 17.5934C23.8301 15.1927 23.3062 13.0348 22.6705 11.1814C21.6695 8.2559 20.4183 6.20019 19.1501 5.3943C18.3664 4.89394 17.6381 4.89501 16.8554 5.3943C15.5861 6.20125 14.3349 8.25697 13.334 11.1824C12.6951 13.037 12.1733 15.1938 11.7751 17.5955C11.5238 19.1147 11.3268 20.7083 11.1894 22.3499C13.3873 21.6276 15.6865 21.261 18.0001 21.2641Z" fill="#640EF1"/>
            <path d="M18.9585 3.95801H17.0417V22.222H18.9585V3.95801Z" fill="#640EF1"/>
            </g>
            <path d="M50.624 18.988C49.056 18.988 47.852 19.94 47.572 21.676H53.564C53.564 19.968 52.22 18.988 50.624 18.988ZM58.1 25.82C57.344 28.872 54.572 31.224 50.68 31.224C46.088 31.224 42.784 28.144 42.784 23.188C42.784 18.232 46.032 15.152 50.68 15.152C55.244 15.152 58.464 18.176 58.464 22.936C58.464 23.384 58.436 23.86 58.38 24.336H47.544C47.712 26.38 48.972 27.332 50.512 27.332C51.856 27.332 52.612 26.66 53.004 25.82H58.1ZM70.1739 11.12C74.8779 11.12 78.2939 13.528 79.3299 17.56H74.0379C73.3099 16.244 71.9659 15.544 70.1739 15.544C67.0939 15.544 65.0499 17.728 65.0499 21.144C65.0499 24.784 67.1219 26.912 70.5659 26.912C72.9459 26.912 74.5979 25.652 75.3259 23.44H69.2499V19.912H79.6659V24.364C78.6579 27.752 75.3819 31.14 70.2019 31.14C64.3219 31.14 60.1779 27.024 60.1779 21.144C60.1779 15.264 64.2939 11.12 70.1739 11.12ZM97.606 23.188C97.606 28.144 94.022 31.224 89.43 31.224C84.838 31.224 81.366 28.144 81.366 23.188C81.366 18.232 84.922 15.152 89.486 15.152C94.078 15.152 97.606 18.232 97.606 23.188ZM86.238 23.188C86.238 25.82 87.694 27.08 89.43 27.08C91.138 27.08 92.734 25.82 92.734 23.188C92.734 20.528 91.166 19.296 89.486 19.296C87.75 19.296 86.238 20.528 86.238 23.188ZM98.6622 15.376H103.786L107.174 26.52L110.562 15.376H115.658L110.114 31H104.206L98.6622 15.376ZM124.562 18.988C122.994 18.988 121.79 19.94 121.51 21.676H127.502C127.502 19.968 126.158 18.988 124.562 18.988ZM132.038 25.82C131.282 28.872 128.51 31.224 124.618 31.224C120.026 31.224 116.722 28.144 116.722 23.188C116.722 18.232 119.97 15.152 124.618 15.152C129.182 15.152 132.401 18.176 132.401 22.936C132.401 23.384 132.374 23.86 132.318 24.336H121.482C121.65 26.38 122.91 27.332 124.45 27.332C125.794 27.332 126.55 26.66 126.942 25.82H132.038ZM139.715 23.748V31H134.927V15.376H139.715V17.98C140.807 16.328 142.515 15.208 144.615 15.208V20.276H143.299C141.031 20.276 139.715 21.06 139.715 23.748ZM159.588 26.464C159.588 29.18 157.18 31.224 153.26 31.224C149.088 31.224 146.288 28.9 146.064 25.876H150.796C150.908 26.968 151.888 27.696 153.204 27.696C154.436 27.696 155.08 27.136 155.08 26.436C155.08 23.916 146.568 25.736 146.568 19.996C146.568 17.336 148.836 15.152 152.924 15.152C156.956 15.152 159.196 17.392 159.504 20.472H155.08C154.94 19.408 154.128 18.708 152.784 18.708C151.664 18.708 151.048 19.156 151.048 19.912C151.048 22.404 159.504 20.64 159.588 26.464ZM169.405 18.988C167.837 18.988 166.633 19.94 166.353 21.676H172.345C172.345 19.968 171.001 18.988 169.405 18.988ZM176.881 25.82C176.125 28.872 173.353 31.224 169.461 31.224C164.869 31.224 161.565 28.144 161.565 23.188C161.565 18.232 164.813 15.152 169.461 15.152C174.025 15.152 177.245 18.176 177.245 22.936C177.245 23.384 177.217 23.86 177.161 24.336H166.325C166.493 26.38 167.753 27.332 169.293 27.332C170.637 27.332 171.393 26.66 171.785 25.82H176.881Z" fill="white"/>
            <defs>
            <clipPath id="clip0_398_102">
            <rect width="36" height="36" fill="white" transform="translate(0 3)"/>
            </clipPath>
            </defs>
            </svg>            
          <p class="text-base leading-loose text-gray-500 sm:text-sm">Bidang E-Goverment <br> Dinas Komunikasi dan Informatika <br> Kajen Kabupaten Pekalongan 51161<br> Jawa Tengah, Indonesia  </p>
          <div class="flex flex-row gap-x-4">

            <!-- email -->

            <div class="bg-white rounded-full flex p-[12px] items-center">
              <a href="#">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M7.26619 15.7363C11.6954 20.1647 15.7998 20.6495 17.0047 20.6945C18.4608 20.7474 19.9468 19.5589 20.5896 18.3415C19.5644 17.1391 18.2293 16.2062 16.7674 15.195C15.9046 16.0565 14.8414 17.6574 13.4256 17.0838C12.6204 16.7602 10.6322 15.8446 8.89504 14.1067C7.1579 12.3687 6.24211 10.382 5.9161 9.57814C5.34243 8.16039 6.94825 7.09505 7.81106 6.23242C6.79965 4.74671 5.8827 3.37733 4.68237 2.40413C3.44748 3.04909 2.25176 4.52328 2.3059 5.99862C2.35083 7.20331 2.8358 11.3069 7.26619 15.7363ZM16.9195 22.9967C15.2607 22.9357 10.5596 22.2861 5.63618 17.3649C0.713911 12.4424 0.0653638 7.74347 0.00315864 6.08385C-0.0889971 3.55469 1.84858 1.09809 4.08681 0.138717C4.35634 0.0223559 4.6515 -0.0219463 4.94332 0.0101576C5.23514 0.0422616 5.5136 0.149668 5.75138 0.321839C7.60371 1.6728 8.88122 3.71939 9.97902 5.32257C10.2074 5.65593 10.312 6.05863 10.2748 6.46097C10.2375 6.86331 10.0608 7.23998 9.77513 7.52579L8.21309 9.08866C8.57595 9.8891 9.31435 11.2689 10.5239 12.4782C11.7334 13.6874 13.1135 14.4257 13.9152 14.7885L15.4761 13.2268C15.7627 12.9399 16.1411 12.763 16.5451 12.727C16.949 12.691 17.3527 12.7982 17.6855 13.0298C19.3213 14.1631 21.2428 15.4219 22.6435 17.2151C22.8297 17.4546 22.9482 17.7396 22.9865 18.0405C23.0248 18.3414 22.9815 18.647 22.8612 18.9254C21.8971 21.1747 19.4572 23.09 16.9195 22.9967Z" fill="#640EF1"/>
                </svg>                                    
              </a>
            </div>

            <!-- instagram -->

            <div class="bg-white rounded-full flex p-[12px] items-center">
              <a href="#">
                <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11.5 5.75C9.97501 5.75 8.51247 6.3558 7.43414 7.43414C6.3558 8.51247 5.75 9.97501 5.75 11.5C5.75 13.025 6.3558 14.4875 7.43414 15.5659C8.51247 16.6442 9.97501 17.25 11.5 17.25C13.025 17.25 14.4875 16.6442 15.5659 15.5659C16.6442 14.4875 17.25 13.025 17.25 11.5C17.25 9.97501 16.6442 8.51247 15.5659 7.43414C14.4875 6.3558 13.025 5.75 11.5 5.75ZM11.5 15.2343C11.0094 15.2343 10.5237 15.1376 10.0705 14.9499C9.61727 14.7622 9.20547 14.487 8.8586 14.1402C8.51172 13.7933 8.23657 13.3815 8.04884 12.9283C7.86111 12.4751 7.76449 11.9893 7.76449 11.4988C7.76449 11.0082 7.86111 10.5225 8.04884 10.0692C8.23657 9.61603 8.51172 9.20423 8.8586 8.85735C9.20547 8.51048 9.61727 8.23532 10.0705 8.04759C10.5237 7.85987 11.0094 7.76325 11.5 7.76325C12.4907 7.76325 13.4409 8.15681 14.1414 8.85735C14.842 9.5579 15.2355 10.508 15.2355 11.4988C15.2355 12.4895 14.842 13.4396 14.1414 14.1402C13.4409 14.8407 12.4907 15.2343 11.5 15.2343Z" fill="#640EF1"/>
                  <path d="M17.7292 6.70825C18.5232 6.70825 19.1667 6.06466 19.1667 5.27075C19.1667 4.47684 18.5232 3.83325 17.7292 3.83325C16.9353 3.83325 16.2917 4.47684 16.2917 5.27075C16.2917 6.06466 16.9353 6.70825 17.7292 6.70825Z" fill="#640EF1"/>
                  <path d="M22.3908 3.96086C22.0954 3.1983 21.6437 2.5058 21.0646 1.9278C20.4855 1.34979 19.7917 0.899037 19.0279 0.604458C18.1343 0.269385 17.1902 0.0882779 16.2359 0.0688622C15.0059 0.0153026 14.6164 0 11.4974 0C8.3785 0 7.97873 -1.28266e-07 6.759 0.0688622C5.80554 0.0885657 4.86234 0.269668 3.96957 0.604458C3.20572 0.899037 2.51197 1.34979 1.93285 1.9278C1.35372 2.5058 0.902002 3.1983 0.606675 3.96086C0.271517 4.85312 0.0905608 5.79574 0.0715238 6.7485C0.0166037 7.97527 0 8.36422 0 11.4796C0 14.595 -9.51596e-09 14.9903 0.0715238 16.2107C0.0906819 17.1646 0.270768 18.1057 0.606675 18.9996C0.902143 19.7623 1.35406 20.4549 1.93341 21.0329C2.51276 21.6109 3.20676 22.0616 3.97085 22.356C4.86173 22.704 5.80544 22.8981 6.76155 22.9299C7.9915 22.9834 8.38105 23 11.5 23C14.6189 23 15.0187 23 16.2384 22.9299C17.1927 22.9109 18.1368 22.7302 19.0304 22.3955C19.7944 22.1008 20.4882 21.6499 21.0674 21.0716C21.6465 20.4934 22.0981 19.8007 22.3933 19.0379C22.7292 18.1452 22.9093 17.2041 22.9285 16.2502C22.9834 15.0235 23 14.6345 23 11.5191C23 8.40375 23 8.00843 22.9285 6.78804C22.9131 5.82181 22.7312 4.86544 22.3908 3.96086ZM20.8351 16.1163C20.828 16.8513 20.6936 17.5796 20.4379 18.2689C20.2452 18.7643 19.9513 19.2141 19.5748 19.5898C19.1983 19.9655 18.7476 20.2587 18.2513 20.4508C17.5682 20.7035 16.8468 20.8377 16.1184 20.8474C14.905 20.9035 14.5628 20.9176 11.4515 20.9176C8.33763 20.9176 8.0196 20.9176 6.78326 20.8474C6.05526 20.8375 5.33432 20.7034 4.6516 20.4508C4.15369 20.2598 3.70122 19.967 3.32315 19.5913C2.94509 19.2155 2.64976 18.7652 2.45608 18.2689C2.2055 17.5866 2.07124 16.8672 2.05886 16.1406C2.00394 14.9291 1.99117 14.5873 1.99117 11.4809C1.99117 8.37442 1.99117 8.05561 2.05886 6.81992C2.06615 6.08532 2.20053 5.35751 2.45608 4.66861C2.84562 3.66245 3.64388 2.87054 4.6516 2.48542C5.33432 2.23286 6.05526 2.09873 6.78326 2.08882C7.99789 2.03399 8.33891 2.01868 11.4515 2.01868C14.564 2.01868 14.8833 2.01869 16.1184 2.08882C16.8468 2.09858 17.5682 2.23272 18.2513 2.48542C18.7477 2.67767 19.1985 2.9711 19.575 3.34699C19.9515 3.72289 20.2454 4.17299 20.4379 4.66861C20.6885 5.35092 20.8228 6.07034 20.8351 6.79696C20.89 8.0097 20.9041 8.35019 20.9041 11.4579C20.9041 14.5656 20.9041 14.8985 20.8492 16.1176L20.8351 16.1163Z" fill="#640EF1"/>
                  </svg>                                                  
              </a>
            </div>

            <!-- facebook -->

            <div class="bg-white rounded-full flex p-[12px] items-center">
              <a href="#">
                <svg width="23" height="23" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M10.434 8.3244V9.9768H9.22437V11.9964H10.434V18H12.9204V11.9964H14.5884C14.5884 11.9964 14.7456 11.028 14.8212 9.9684H12.93V8.5884C12.93 8.3808 13.2012 8.1036 13.47 8.1036H14.8236V6H12.9816C10.3728 6 10.434 8.022 10.434 8.3244Z" fill="#640EF1"/>
                  <path d="M12 21.6C14.5461 21.6 16.9879 20.5886 18.7882 18.7882C20.5886 16.9879 21.6 14.5461 21.6 12C21.6 9.45392 20.5886 7.01212 18.7882 5.21178C16.9879 3.41143 14.5461 2.4 12 2.4C9.45392 2.4 7.01212 3.41143 5.21178 5.21178C3.41143 7.01212 2.4 9.45392 2.4 12C2.4 14.5461 3.41143 16.9879 5.21178 18.7882C7.01212 20.5886 9.45392 21.6 12 21.6ZM12 24C5.3724 24 0 18.6276 0 12C0 5.3724 5.3724 0 12 0C18.6276 0 24 5.3724 24 12C24 18.6276 18.6276 24 12 24Z" fill="#640EF1"/>
                </svg>                            
              </a>
            </div>

            <!-- web -->

            <div class="bg-white rounded-full flex p-[12px] items-center">
              <a href="#">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#640EF1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M8.00001 3H9.00001C7.05001 8.84 7.05001 15.16 9.00001 21H8.00001" stroke="#640EF1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M15 3C16.95 8.84 16.95 15.16 15 21" stroke="#640EF1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M3 16V15C8.84 16.95 15.16 16.95 21 15V16" stroke="#640EF1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M3 9.0001C8.84 7.0501 15.16 7.0501 21 9.0001" stroke="#640EF1" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            </div>
          </div>
        </div>

        <!-- sitemap1 -->

        <div class="flex flex-col gap-y-7">
          <h3 class="text-white font-bold text-lg">Informasi Publik</h3>
          <ul class="flex flex-col gap-y-4">
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Berita
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Artikel
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Open Data
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Pengumuman
              </a>
            </li>
          </ul>
        </div>

        <!-- sitemap2 -->

        <div class="flex flex-col gap-y-7">
          <h3 class="text-white font-bold text-lg">Tentang</h3>
          <ul class="flex flex-col gap-y-4">
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Profil
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Visi & Misi
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Struktur Organisasi
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Data Pegawai
              </a>
            </li>
          </ul>
        </div>

        <!-- sitemap3 -->

        <div class="flex flex-col gap-y-7">
          <h3 class="text-white font-bold text-lg">Bantuan</h3>
          <ul class="flex flex-col gap-y-4">
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Panduan Pengguna
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Lapor Kendala Layanan
              </a>
            </li>
            <li>
              <a href="#" class="text-base text-gray-500 hover:text-violet-700 sm:text-sm">
                Laporkan Penyalahgunaan
              </a>
            </li>
          </ul>
        </div>
      </div>
     </section>
    <!-- footer -->

</body>
</html>