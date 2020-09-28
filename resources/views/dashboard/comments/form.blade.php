<div class="col-md-12">
    @php
      $input = 'comment';
    @endphp
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Comment</label>
      <textarea name="{{$input}}" class="form-control">{{isset($row) ? $row->$input : ''}}</textarea>
      @error($input)
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
  </div>