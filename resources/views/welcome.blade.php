@extends('layouts.front')
@section('title', 'Home Page')
@section('content')
  
  @include('front.homepage-sections.page-header')

  @include('front.homepage-sections.videos')
  
  @include('front.homepage-sections.statics')
  
  @include('front.homepage-sections.contact-us')

@endsection