@extends('layouts.admin')
@section('title')
{{ $page_title }}
@endsection

@section('content')
    @component('dashboard.includes.navbar')
        @slot('page_title')
          {{ $page_title }}
        @endslot
    @endcomponent

    @component('dashboard.shared.table',['page_title'=>$page_title,'page_desc'=>$page_desc])
        @slot('addButton')
          <div class="col-md-4 text-right">
            <a href="{{ route($folderName .'.create') }}" class="btn btn-white btn-round">
              Add {{ $singular }}
            </a>
          </div>
        @endslot
        {{-- Start Slot Table --}}
        @slot('table')
        <div class="table-responsive">
          <table class="table table-hover">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Group</th>
                      <th class="text-right">Controls</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($rows as $row)
                      <tr>
                          <td>{{ $row->id }}</td>
                          <td>{{ $row->name }}</td>
                          <td>{{ $row->email }}</td>
                          <td>{{ $row->group }}</td>
                          <td class="td-actions text-right">
                              @include('dashboard.shared.buttons.edit')
                              @include('dashboard.shared.buttons.destroy')
                          </td>
                      </tr>
                  @endforeach 
              </tbody>
          </table>
          {{-- End Table --}}
        </div>
        {{-- End Table Responsive --}}
        @endslot
        {{-- End Slot Table --}}
    @endcomponent
    {{ $rows->links() }}
@endsection