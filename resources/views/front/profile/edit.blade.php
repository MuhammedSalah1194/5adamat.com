<div class="card text-left" id="Profcard" style="display: none;">
  <div class="card-header">
     <h5> Update Profie</h5>
  </div>
  <div class="card-body">
    <form action="{{route('profile.update')}}" method="POST">
      <div class="row mt-4">
            {{csrf_field()}}
              @php
              $input = 'name';
              @endphp
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Username</label>
              <input type="text" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" value="{{ isset($row) ? $row->{$input} : '' }}">
              @error($input)
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
              </div>
            </div>
        
            @php
                $input = 'email';
            @endphp
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Email address</label>
                <input type="email" class="form-control  @error($input) is-invalid @enderror" name="{{$input}}" value=" {{isset($row) ? $row->{$input} : ''}} ">
                @error($input)
                <span class="inval
                id-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
        
            @php
                $input = 'password';
            @endphp
            <div class="col-md-6">
              <div class="form-group bmd-form-group">
                <label class="bmd-label-floating">Password</label>
                <input type="password" class="form-control @error($input) is-invalid @enderror" name="{{$input}}" >
                @error($input)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
        
          </div>
          <button type="submit" class="btn btn-danger pull-right">Update Profile</button>
              <div class="clearfix"></div>
  </form>
  </div>
</div>



