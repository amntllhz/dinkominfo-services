@extends('layouts.front')

@section('title', 'Detail Status')

@section('content')
    <section class="max-w-6xl mx-auto py-12 sm:max-w-xs md:max-w-lg">
        <div class="mx-auto max-w-xl">
          <div class="space-y-12">
            @if($details)
              <x-found-data :details="$details"></x-found-data>
            @else
              <x-no-data :receipt="$receipt"></x-no-data>
            @endif
          </div>
        </div>
        

          
    </section>
@endsection