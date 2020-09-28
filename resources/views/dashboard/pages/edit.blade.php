@extends('layouts.admin')
@section('title')
{{ $page_title }}
@endsection

@section('content')
        @component('dashboard.shared.edit',['page_desc'=>$page_desc])
          <form action="{{route($folderName.'.update', $row->id)}}" method="POST">
              @csrf
                  <input type="hidden" name="_method" value="PUT">
              @include('dashboard.'. $folderName.'.form')
              <button type="submit" class="btn btn-primary pull-right">Update {{ $page_title }}</button>
              <div class="clearfix"></div>
            </form>
        @endcomponent
@endsection