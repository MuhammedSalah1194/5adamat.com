<div class="row">
  @php
    $input = 'name';
  @endphp
  <div class="col-md-6">
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Name</label>
      <input type="text" class="form-control" name="name" value="{{ isset($row) ? $row-> $input  : ''}}">
    </div>
  </div>
  <div class="col-md-6">
    @php
      $input = 'keywords';
    @endphp
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">keywords</label>
      <input type="text" class="form-control" name="keywords" value="{{isset($row) ? $row-> $input  : ''}}">
    </div>
  </div>
  <div class="col-md-12 mb-4">
    @php
      $input = 'desc';
    @endphp  
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Description</label>
      <textarea name="desc" class="form-control" cols="30" rows="10">{{$row->$input}}</textarea>
    </div>
  </div>
  <div class="col-md-12">
    @php
      $input = 'meta_desc';
    @endphp  
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Meta_desc</label>
      <input type="text" name="meta_desc" class="form-control" value="{{isset($row) ? $row-> $input  : ''}}">
    </div>
  </div>
</div>





