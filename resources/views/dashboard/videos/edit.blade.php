@extends('layouts.admin')
@section('title')
{{ $page_title }}
@endsection

@section('content')
        @component('dashboard.shared.edit',['page_desc'=>$page_desc])
          <form action="{{route($folderName.'.update', $row->id)}}" method="POST" enctype="multipart/form-data">
              @csrf
                  <input type="hidden" name="_method" value="PUT">
              @include('dashboard.'. $folderName.'.form')
              <button type="submit" class="btn btn-primary pull-right">Update {{ $page_title }}</button>
              <div class="clearfix"></div>
            </form>
            @slot('md4')
            @php
              $url = getYoutubeId($row->youtube);@endphp
              @if($url)
                <iframe width="500" height="300" src="https://www.youtube.com/embed/{{ $url }}" frameborder="0"  allowfullscreen></iframe>
              @endif
              <img src="{{ url('uploads/'. $row->image) }}" width="500" height="300" class="mt-5">
            @endslot
        @endcomponent
        
        @component('dashboard.shared.edit',['page_desc'=>'Comments' , 'page_desc'=> 'All Records Comments'])
            @include('dashboard.comments.index')
            @slot('md4')
              @include('dashboard.comments.create')
            @endslot
        @endcomponent
@endsection