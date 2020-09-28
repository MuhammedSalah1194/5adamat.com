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
                      <th>Published</th>
                      <th>Category</th>
                      <th>User</th>
                      <th class="text-right">Controls</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($rows as $row)
                      <tr>
                          <td>{{ $row->id }}</td>
                          <td>{{ $row->name }}</td>
                          <td>
                              @if ( $row->published  == 1)
                              {{-- <div _ngcontent-kxx-c22="" class="icon-item-inner-container" style="margin-left: 16px;font-size:30px;color: #080"><icons-image _ngcontent-kxx-c22="" _nghost-kxx-c19="">
                                <span _ngcontent-kxx-c19="" class="material-icons icon-image-preview">done_outline</span></icons-image><span _ngcontent-kxx-c22="" class="icon-item-title">
                                </span></div> --}}

                              <div _ngcontent-pie-c22="" class="icon-item-container active" style="margin-left: 16px;font-size:30px;color: #080" title="check_circle_outline"><div _ngcontent-pie-c22="" class="icon-item-inner-container"><icons-image _ngcontent-pie-c22="" _nghost-pie-c19=""><span _ngcontent-pie-c19="" class="material-icons icon-image-preview">check_circle_outline</span></icons-image><span _ngcontent-pie-c22="" class="icon-item-title"></span></div></div>
                                @else
                                <div _ngcontent-kxx-c22="" class="icon-item-inner-container" style="margin-left: 16px; font-size:30px;color: #f00;"><icons-image _ngcontent-kxx-c22="" _nghost-kxx-c19="">
                                  <span _ngcontent-kxx-c19="" class="material-icons icon-image-preview">close</span></icons-image><span _ngcontent-kxx-c22="" class="icon-item-title"></span>
                                </div>
                              @endif
                          </td>
                          <td>{{ $row->cat->name }}</td>
                          <td>{{ $row->user->name }}</td>
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