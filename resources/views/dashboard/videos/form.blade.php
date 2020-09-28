<div class="row">
  @php
    $input = 'name';
  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text" class="form-control" name="{{$input}}" value="{{ isset($row) ? $row->  $input  : ''}}">
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
      <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{isset($row) ? $row-> $input  : ''}}">
      @error($input)
          <span class="invalid-feedback" role="alert">ss
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
      <input type="url" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{isset($row) ? $row-> $input  : ''}}">
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


  <div class="col-md-6">
    @php
      $input = 'skills[]';
    @endphp
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Skills</label>
      <select name="{{ $input }}" class="form-control @error($input) is-invalid @enderror" multiple style="height:100px;">
          @foreach ($skills as $skill)
              <option value="{{ $skill->id }}" {{ in_array($skill->id , $skillSelect) ? 'selected' : '' }}>{{ $skill->name }}</option>  
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
              <option value="{{ $tag->id }}" {{ in_array($tag->id , $TagSelect) ? 'selected' : '' }}>{{ $tag->name }}</option>  
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
      <textarea name="{{$input}}" class="form-control" cols="30" rows="10">{{$row->$input}}</textarea>
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
      <input type="text" name="{{$input}}" class="form-control" value="{{isset($row) ? $row-> $input  : ''}}">
      @error($input)
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
  </div>

  <div class="col-md-12">
    @php
      $input = 'image';
    @endphp
    <div class="">
      <label class="bmd-label-floating">Video Image</label>
      <input type="file" name="{{$input}}" >
      @error($input)
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      @if( $row->image != null)
          <img src="{{url('uploads/' . $row->image)}}" width="150px" height="150" alt="">
      @endif
    </div>
  </div>

</div>


