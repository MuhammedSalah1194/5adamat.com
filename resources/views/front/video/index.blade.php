
@extends('layouts.front')

@section('title', $video->name)

@section('content')
<div class="container">
  <div class="section section-buttons">
      <div class="title">
        <h1>{{ $video->name }}</h1>
      </div>
      <div class="row">
        <div class="col-md-12">
            @php
            $url = getYoutubeId($video->youtube);@endphp
            @if($url)
              <iframe width="100%" height="500" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0"  allowfullscreen></iframe>
            @endif
        </div>
      </div>

      <div class="row mt-3">
        <div class="col-md-6">
            <a href="" class="text-secondary"><p><i class="nc-icon nc-circle-10"></i> &nbsp; {{ $video->user->name }}</p></a>
            <a href="{{ route('front.category', $video->cat->id) }}" class="text-secondary"><p><i class="nc-icon nc-calendar-60"></i> &nbsp; {{ $video->cat->name}}</p></a>
            <p>{{ $video->created_at}}</p>
          </div>
          <div class="col-md-6">
            <p class=""> Desc : {{ $video->desc}}</p>

            <p>
              Tag :
                @foreach ($video->tags as $tag)
                <a href="{{ route('front.tags', $tag->id) }}"><span class="badge badge-pill badge-success">{{ $tag->name }}</span></a>
                @endforeach
            </p>
            <p>
              Skill :
                @foreach ($video->skills as $skill)
                <a href="{{ route('front.skill', $skill->id) }}"><span class="badge badge-pill badge-default">{{ $skill->name }}</span></a>
                @endforeach
            </p>
          </div>
      </div>
      @include('front.video.comment')
      @if (auth()->user())
      <form action="{{ route('front.commentStore', ['id'=>$video->id]) }}" method="POST">
          @csrf
           <div class="form-group">
             <label for="">Add Comment</label>
             <textarea name="comment" cols="15" rows="4" class="form-control"></textarea>
           </div>
         <input type="submit" class="btn btn-default mt-3" value="Add Comment"></button>
       </form>
      @endif
    </div>
  </div>
@endsection