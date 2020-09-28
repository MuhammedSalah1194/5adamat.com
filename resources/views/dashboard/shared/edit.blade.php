<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title">{{ $page_desc }}</h4>
      </div>
      <div class="card-body">
        {{ $slot }}
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card-body">
      {{ isset($md4) ? $md4 :''}}
    </div>
  </div>
</div>