@extends('layouts.form')

@section('title', 'Pengajuan Berhasil')

@section('content')
  <!-- FORM -->
    <section class="max-w-6xl mx-auto py-12 sm:max-w-xs">
          <div class="mx-auto max-w-md">
            <div class="space-y-12">
              <x-success-submit-service :submission="$submission"></x-success-submit-service>
          </div>
    </section>
  <!-- FORM -->
@endsection

@section('scripts')
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>    
@endsection