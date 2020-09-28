{{-- Start Main Row --}}
<div class="row">
      {{-- Start Col-md --}}
    <div class="col-md-12">
      {{-- Start Card --}}
      <div class="card card-plain ">
        {{-- Start Card Header --}}
        <div class="card-header card-header-primary">
          {{-- Start Row Inner --}}
          <div class="row">
              <div class="col-md-8">
                <h4 class="card-title mt-0"> {{ $page_desc }}</h4>
              </div>
              {{ $addButton }}
          </div>
        </div>
        <div class="card-body">
            {{ $table }}
        </div>
        {{-- End Card Body --}}
      </div>
      {{-- End Card --}}
    </div>
{{-- End Col-md --}}
</div>
{{-- End Main Row --}}