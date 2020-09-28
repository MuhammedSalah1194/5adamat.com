<div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item {{ is_active('') }}">
        <a class="nav-link" href="{{ url('/admin') }}">
          <i class="material-icons">dashboard</i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('users') }}">
        <a class="nav-link" href="{{ url('admin/users') }}">
          <i class="material-icons">person</i>
          <p>Users</p>
        </a>
      </li>
       <li class="nav-item {{ is_active('categories') }}">
        <a class="nav-link" href="{{ url('admin/categories') }}">
          <i class="material-icons">category</i>
          <p>Categories</p>
        </a>
      </li>
       <li class="nav-item {{ is_active('skills') }}"> 
        <a class="nav-link" href="{{url('admin/skills')}}">
          <i class="material-icons">library_books</i>
          <p>Skills</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('tags') }}">
        <a class="nav-link" href="{{ url('admin/tags') }}">
          <i class="material-icons">bubble_chart</i>
          <p>Tags</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('pages') }}">
        <a class="nav-link" href="{{ url('admin/pages') }}">
          <i class="material-icons">location_ons</i>
          <p>Pages</p>
        </a>
      </li> 
      <li class="nav-item {{ is_active('videos') }}">
        <a class="nav-link" href="{{ url('admin/videos') }}">
          <i class="material-icons">video_call</i>
          <p>Videos</p>
        </a>
      </li>
      <li class="nav-item {{ is_active('contacts') }}">
        <a class="nav-link" href="{{ url('admin/contacts') }}">
          <i class="material-icons">content_paste</i>
          <p>Contacts</p>
        </a>
      </li>
    </ul>
  </div>