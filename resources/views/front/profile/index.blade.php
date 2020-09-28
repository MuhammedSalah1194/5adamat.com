
@extends('layouts.front')

@section('title', $row->name)


@section('content')
<div class="container">
  <div class="section section-buttons">
      <div class="title">
    </div>
</div>
@endsection
<div class="section profile-content" style="margin-top: 190px;">
  <div class="container">
    <div class="owner">
      <div class="avatar">
        <img src="{{ asset('assets/img/faces/card-profile1-square.jpg') }}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
      </div>
      <div class="name">
        <h4 class="title">{{ $row->name }}
          <br>
        </h4>
        <h6 class="description">{{ $row->email }}</h6>
      </div>
    </div>
    @if(auth()->user() && $row->id == auth()->user()->id)
      
    <div class="row">
      <div class="col-md-6 ml-auto mr-auto text-center">
        <p>An artist of considerable range, Jane Faker — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. </p>
        <br>
        <button class="btn btn-outline-default btn-round" onclick="$('#Profcard').slideToggle(1000)"><i class="fa fa-cog"></i> Update Profie</button>
      </div>
    </div>
    <br>
          @include('front.profile.edit')
    @endif
    </div>
  </div>
</div>