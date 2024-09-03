@extends('layouts.front')

@section('title', 'Beranda')

@section('content')
    <section class="max-w-6xl mx-auto py-12 md:max-w-lg sm:max-w-xs">
        <div class="flex flex-col gap-y-2 text-center mb-8">
            <h3 class="text-5xl text-indigo-950 font-clash font-bold sm:text-3xl">Panduan Pengguna</h3>
        </div>                         

        <!-- Guide -->

        <x-guide></x-guide>
    
 
    </section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        initFlowbite();
    });
</script>
@endsection