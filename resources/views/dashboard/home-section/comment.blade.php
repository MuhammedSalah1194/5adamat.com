<div class="row">
    <div class="col-lg-12 col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Latest  Comment</h4>
          <p class="card-category">Here are Your comments</p>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-hover">
            <thead class="text-warning">
              <tr><th>ID</th>
              <th>Name</th>
              <th>Video</th>
              <th>Comment</th>
              <th>Date</th>
            </tr></thead>
            <tbody>
              @foreach ($comments as $comment)
                <tr>
                  <td>{{ $comment->id}}</td>
                  <td>
                    <a href="{{ url('admin/users/' . $comment->user->id.'/edit') }}">
                      {{ $comment->user->name }}  
                    </a>
                  </td>
                  <td>
                    <a href="{{ url('admin/videos/' . $comment->video->id.'/edit') }}">
                      {{ $comment->video->name }}  
                    </a>
                  </td>
                  <td>
                      {{ $comment->comment }}  
                  </td>
                  <td>{{ $comment->created_at }}</td>
                </tr>
                @endforeach
              </tr>
            </tbody>
          </table>
          {{ $comments->links() }}
        </div>
      </div>
    </div>
  </div>