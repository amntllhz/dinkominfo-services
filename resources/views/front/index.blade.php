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

  <!-- accordion faq-->
    <x-accordion :questions="$questions" :answers="$answers" />
  <!-- accordion faq--> 

@endsection

