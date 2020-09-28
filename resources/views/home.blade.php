<style>
  .dropdown-menu .dropdown-item{
    background:#999;
    color:#fff !important;
    border-radius:12px;
    margin-top: 5px;
  }

  .dropdown-menu:hover{
    cursor: pointer;
  }

</style>
@extends('layouts.front')

@section('content')
<div class="container">
  <div class="section section-buttons">
      <div class="title">
        <h2 style="padding:20px 0px;">Latests Videos</h2>
        @if (request()->has('search') && request()->get('search') != '')
            you are search on <strong>{{ request()->get('search') }}</strong>
            <br>
              <a class="text-link pull-right" href="{{ route('home') }}">Back</a>
              <br>
        @endif
        @include('front.shared.video-row')
      </div>
    </div>
@endsection
