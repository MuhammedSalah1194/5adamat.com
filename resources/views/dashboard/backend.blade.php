@extends('layouts.admin')

@php
  $page_title = 'Home Page';
@endphp

@section('title')
  Home Page
@endsection

{{-- Start Style --}}
@push('css')
  <style>
      
  </style>
@endpush
{{-- End Style --}}

@section('content')
    @component('dashboard.includes.navbar')
        @slot('page_title')
            Home Page
        @endslot
    @endcomponent
    @include('dashboard.home-section.statsic')
    
    @include('dashboard.home-section.comment')


    {{-- End Row --}}
    
@endsection

{{-- Start js script --}}
@push('js')
    
@endpush
{{-- End js script --}}