
@extends('layouts.front')

@section('title', $skill->name)


@section('content')
<div class="container">
  <div class="section section-buttons">
      <div class="title">
        <h1>{{ $skill->name }}</h1>
      </div>
      @include('front.shared.video-row')
      </div>
    </div>
@endsection
