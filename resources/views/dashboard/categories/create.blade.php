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
              <div class="row">
                @php
                  $input = 'name';
                @endphp
                <div class="col-md-6">
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{ $input }}" value="{{ old($input) }}">
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  @php
                    $input = 'keywords';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Keywords</label>
                    <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{ $input }}" value="{{ old($input) }}">
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  @php
                    $input = 'desc';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Description</label>
                    <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{ $input }}">
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Add {{ $page_title }}</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
@endsection
