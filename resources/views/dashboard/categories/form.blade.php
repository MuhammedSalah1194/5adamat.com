<div class="row">
  @php
  $input = 'name';
@endphp
<div class="col-md-6">
  <div class="form-group bmd-form-group">
    <label class="bmd-label-floating">Name</label>
    <input type="text" class="form-control" name="{{ $input }}" value="{{ isset($row) ? $row-> $input  : ''}}">
  </div>
</div>
<div class="col-md-6">
  @php
    $input = 'keywords';
  @endphp
  <div class="form-group bmd-form-group">
    <label class="bmd-label-floating">keywords</label>
    <input type="text" class="form-control" name="{{ $input }}" value="{{isset($row) ? $row-> $input  : ''}}">
  </div>
</div>
<div class="col-md-6">
  @php
    $input = 'desc';
  @endphp  
  <div class="form-group bmd-form-group">
    <label class="bmd-label-floating">Description</label>
    <textarea name="{{ $input }}" cols="30" rows="10" class="form-control">{{ $row-> $input  }}</textarea>
  </div>
</div>
</div>
