
<div class="card" style="width: 20rem;">
  <a href="{{ route('front.video', $video->id) }}" title="{{ $video->name }}">
      <img class="card-img-top" src="{{ url('uploads/' . $video->image) }}" alt="{{ $video->name }}" style="width:500px;height:250px;">
  </a>
  <div class="card-body">
    <p class="card-text">
      <a href="" title="{{ $video->name }}">
        {{ $video->name }}
      </a>
    </p>
    <small>
      {{ $video->created_at }}
    </small>
  </div>
</div>