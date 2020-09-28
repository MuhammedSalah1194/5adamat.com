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
      $input = 'email';
    @endphp
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Email</label>
      <input type="email" class="form-control" name="email" value="{{isset($row) ? $row-> $input  : ''}}">
    </div>
  </div>
  <div class="col-md-12 mb-4">
    @php
      $input = 'message';
    @endphp  
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Message</label>
      <textarea name="message" class="form-control" cols="30" rows="10">{{$row->$input}}</textarea>
    </div>
  </div>
</div>

<hr>

<h4>
    Reply a Messages
</h4>
<br>
<form action="{{ route('contact.reply' , ['id'=>$row->id])  }}" method="POST">
  @csrf
  <div class="col-md-12 mb-4">
    @php
      $input = 'message';
    @endphp  
    <div class="form-group bmd-form-group">
      <label class="bmd-label-floating">Message</label>
      <textarea name="message" class="form-control" cols="30" rows="10"></textarea>
      <button type="submit" class="btn btn-primary pull-right">Reply</button>
      <div class="clearfix"></div>
    </div>
  </div>
</form>



