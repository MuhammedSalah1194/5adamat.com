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
</div>