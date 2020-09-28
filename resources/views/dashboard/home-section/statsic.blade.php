<div class="row">
    {{-- Users --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="material-icons">content_copy</i>
          </div>
          <p class="card-category">Videos</p>
          <h3 class="card-title">{{ $video }}
            {{-- <small>GB</small> --}}
          </h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            {{-- <i class="material-icons text-warning">warning</i> --}}
            <a href="{{ route('users.index') }}" class="text-white">All Videos</a>
          </div>
        </div>
      </div>
    </div>
    {{-- Categories --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="material-icons">store</i>
          </div>
          <p class="card-category">Categories</p>
          <h3 class="card-title">{{ $category }}
        </div>
        <div class="card-footer">
          <div class="stats">
            {{-- <i class="material-icons">date_range</i>  --}}
            <a href="{{ route('categories.index') }}" class="text-white">All Categories</a>
          </div>
        </div>
      </div>
    </div>
    {{-- End Categories --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="material-icons">info_outline</i>
          </div>
          <p class="card-category">Skills</p>
          <h3 class="card-title">{{ $skill }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            {{-- <i class="material-icons">local_offer</i> --}}
            <a href="{{ route('skills.index') }}" class="text-white">All Skills</a>

          </div>
        </div>
      </div>
    </div>
    {{-- End Skills --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="fa fa-twitter"></i>
          </div>
          <p class="card-category">Tags</p>
          <h3 class="card-title">{{ $tag }}</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            {{-- <i class="material-icons">update</i>  --}}
            <a href="{{ route('tags.index') }}" class="text-white">All Tags</a>

          </div>
        </div>
      </div>
    </div>
    {{-- End Tags --}}
</div>