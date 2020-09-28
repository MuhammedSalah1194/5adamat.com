@extends('layouts.admin')
@section('title')
{{ $page_title }}
@endsection

@section('content')
        @component('dashboard.shared.edit',['page_desc'=>$page_desc])
              @include('dashboard.'. $folderName.'.form')
              
        @endcomponent
@endsection