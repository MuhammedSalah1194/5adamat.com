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
            <form action="{{route($folderName.'.store')}}" method="POST" enctype="multipart/form-data">
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

                <div class="col-md-12">
                  @php
                    $input = 'youtube';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Youtube URL</label>
                    <input type="url" class="form-control @error($input) is-invalid @enderror" name="{{ $input }}" value="{{ old($input) }}">
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                
                <div class="col-md-12">
                  @php
                    $input = 'published';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Videos Status</label>
                    <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                        <option value="1" {{ isset($row) && $row->{ $input } == 1 ? 'selected' : '' }}>Published</option>  
                        <option value="0" {{ isset($row) && $row->{ $input } == 0 ? 'selected' : '' }}>Hidden</option>  
                    </select>                    
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12">
                  @php
                    $input = 'cat_id';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Videos Category</label>
                    <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ isset($row) && $row->{ $input } == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>  
                        @endforeach  
                    </select>                    
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12">
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
                <div class="col-md-12">
                  @php
                    $input = 'meta_desc';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Meta_desc</label>
                    <textarea name="meta_desc" cols="30" rows="10" class="form-control @error($input) is-invalid @enderror"></textarea>
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-12 mb-5">
                  @php
                    $input = 'image';
                  @endphp
                  <div class="">
                    <label class="">Video Image</label>
                    <input type="file" name="{{ $input }}">
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  @php
                    $input = 'skills[]';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Skills</label>
                    <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" multiple style="height:100px;">
                        @foreach ($skills as $skill)
                            <option value="{{ $skill->id }}" {{ isset($row) && $row->{ $input } == $skill->id ? 'selected' : '' }}>{{ $skill->name }}</option>  
                        @endforeach  
                    </select>                    
                    @error($input)
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>

                <div class="col-md-6">
                  @php
                    $input = 'tags[]';
                  @endphp
                  <div class="form-group bmd-form-group">
                    <label class="bmd-label-floating">Tags</label>
                    <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" multiple style="height:100px;">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}" {{ isset($row) && $row->{ $input } == $tag->id ? 'selected' : '' }}>{{ $tag->name }}</option>  
                        @endforeach  
                    </select>                    
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
