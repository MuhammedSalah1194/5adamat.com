
@extends('layouts.front')

@section('title', $cat->name)


@section('content')
<div class="container">
  <div class="section section-buttons">
      <div class="title">
        <h1>{{ $cat->name }}</h1>
      </div>
      @include('front.shared.video-row')
      </div>
    </div>
@endsection
