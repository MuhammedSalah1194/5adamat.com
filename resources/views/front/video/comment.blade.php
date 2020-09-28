<div class="row">
    <div class="col-md-12 mt-4">
      <div class="card">
        <div class="card-header card-header-rose">
          @php $comments = $video->comments @endphp
          <h5>Al Records Comments ({{ count($comments) }})</h5>
        </div>
        <div class="card-body">
            @foreach ($comments as $comment)
            <p class="mb-3">
              <i class="nc-icon nc-circle-10"></i> <a href="{{ route('front.profile', ['id'=>$comment->user->id, 'slug'=>slug($comment->user->name)]) }}">{{ $comment->user->name }}</a>
              <span class="pull-right">{{ $comment->created_at }}&nbsp; <i class="nc-icon nc-calendar-60"></i></span>
              <p>
                {{ $comment->comment }}
              </p>
                @if(auth()->user())
                  @if((auth()->user()->group == 'admin') || auth()->user()->id == $comment->user->id)
                  
                  <button type="button" onclick="$(this).next('div').slideToggle()" class="btn btn-link" >edit
                  </button>
                      <div style="display:none;">
                          <form action="{{ route('front.commentUpdate', ['id'=>$comment->id]) }}" method="POST">
                             @csrf
                                <div class="form-group">
                                  <textarea name="comment" cols="15" rows="4" class="form-control">{{ $comment->comment }}</textarea>
                                </div>
                              <input type="submit" class="btn btn-default mt-3" value="Update"></button>
                          </form>
                      </div>
                  @endif
                </p> 
                @endif
              
               @if(!$loop->last)
                    <hr>
               @endif
          @endforeach
        </div>
      </div>
    </div>
  </div>