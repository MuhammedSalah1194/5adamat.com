@extends('layouts.admin')

@section('title')
{{ $page_title }}
@endsection

@section('content')
<div class="col-md-8">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">{{ $page_desc }}</h4>
            {{-- <p class="card-category">Complete your profile</p> --}}
          </div>
          <div class="card-body">
            <form action="{{route($folderName.'.store')}}" method="POST">
              @csrf
              @include('dashboard.'. $folderName.'.form')
              <button type="submit" class="btn btn-primary pull-right">Add {{ $page_title }}</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
@endsection
