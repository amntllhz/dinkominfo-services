<!-- navbar -->
    <nav class="flex mx-auto max-w-6xl mt-10 sm:max-w-xs items-center justify-between md:max-w-xl">
    <a href="{{ route('front.index') }}">
        <x-logo-nav></x-logo-nav>
    </a>
        
    <ul class="flex flex-row gap-x-10 mx-auto lg:block sm:hidden md:hidden">
        <li>
        <a href="{{ route('front.index') }}" class="text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Beranda</a>
        </li>  
        <li>
        <a href="{{ route('front.index') }}#services" class="text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Layanan</a>
        </li>          
        <li>
        <a href="{{ route('front.status') }}" class="text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Cek Status</a>
        </li>
    </ul>
    
    <!-- Hamburger Button -->
    <button id="hamburger" class="sm:block md:block hidden text-violet-700">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
    </button>
    
    <!-- mobile -->
    <div id="mobile-menu" class="fixed inset-0 bg-white p-5 shadow-lg lg:hidden md:hidden hidden z-50">
        <button id="close-menu-a" class="text-violet-700 absolute top-5 right-5 text-2xl">
        &times;
        </button>
        <ul class="mt-10 space-y-4">
        <li>
            <a href="{{ route('front.index') }}" class="block text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Beranda</a>
        </li>
        <li>
            <a href="{{ route('front.index') }}#services" class="block text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Layanan</a>
        </li>
        <li>
            <a href="{{ route('front.status') }}" class="block text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Cek Status</a>
        </li>
        </ul>
    </div>

    <!-- tab -->
    <div id="tab-menu" class="fixed inset-0 bg-white p-5 shadow-lg lg:hidden hidden sm:hidden z-50">
        <button id="close-menu-b" class="text-violet-700 absolute top-5 right-5 text-2xl">
        &times;
        </button>
        <ul class="mt-10 space-y-4">
        <li>
            <a href="{{ route('front.index') }}" class="block text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Beranda</a>
        </li>
        <li>
            <a href="{{ route('front.index') }}#services" class="block text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Layanan</a>
        </li>
        <li>
            <a href="{{ route('front.status') }}" class="block text-base font-semibold text-violet-700 hover:bg-slate-200 p-2 rounded-md">Cek Status</a>
        </li>
        </ul>
    </div>
    </nav>
<!-- navbar --> 