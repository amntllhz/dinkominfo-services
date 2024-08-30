@extends('layouts.front')

@section('title', 'Beranda')

@section('content')
<section class="max-w-6xl mx-auto py-12 md:max-w-lg sm:max-w-xs">
    <div class="flex flex-col gap-y-2 text-center mb-8">
        <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-3xl">Contributors</h3>
        <p class="text-base font-semibold leading-loose text-violet-700 sm:text-xs sm:py-1 sm:px-2 bg-violet-100 rounded-full w-fit px-8 mx-auto md:text-sm md:py-1">Praktik Kerja Lapangan Dinkominfo Kabupaten Pekalongan 2024</p>
    </div>
    
    <div class="text-base text-gray-500 text-justify mb-6 max-w-5xl mx-auto">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae cupiditate autem quam aperiam hic dignissimos voluptatum ea excepturi. Eaque expedita illo voluptatum, sapiente ipsam vel maiores hic et reprehenderit dolore fugiat eum a nobis similique, quod cupiditate aliquid saepe rerum ea iusto deleniti sed perferendis voluptate totam! Distinctio molestias voluptate repellat porro sint et pariatur vel enim saepe fugit mollitia inventore neque dolorem dolor magni consequatur blanditiis minus, tempore reiciendis perspiciatis commodi minima tenetur doloremque eligendi. Maiores error suscipit atque optio sequi maxime repellendus sit saepe, voluptate autem ex impedit! Voluptas beatae dolor commodi consequatur sunt explicabo placeat expedita? Esse.</p>
    </div>
    <x-contributor :interns="$interns"></x-contributor>

</section>

@endsection