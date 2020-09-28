<form action="{{route($folderName.'.destroy',$row->id)}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove {{$singular}}">
        <i class="material-icons">close</i>
    </button>
</form>