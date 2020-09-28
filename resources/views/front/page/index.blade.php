
@extends('layouts.front')

@section('title', $page->name)


@section('content')
<div class="container">
  <div class="section section-buttons" style="min-height:800px;">
      <div class="title">
        <h1>{{ $page->name }}</h1>
      </div>
        <p>
          {{ $page->desc }}
        </p>
      </div>
    </div>
@endsection
