<table class="table" id="comments">
        <tbody>
                @foreach ($comments as $comment)
                     <tr>
                        <td>
                           <p>{{ $comment->user->name }}</p>
                           <P>{{ $comment->comment }}</P>
                           <P><small>{{ $comment->created_at }}</small></P>
                        </td>
                        <td class="td-actions text-right">
                        <button type="button" onclick="$(this).closest('tr').next('tr').slideToggle()" rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Edit comment">
                          <i class="material-icons">edit</i>
                        </a>
                        <a href="{{ route('comment.destroy', $comment->id)}}"  rel="tooltip" title="" class="btn btn-white btn-link btn-sm" data-original-title="Remove comment">
                           <i class="material-icons">close</i>
                        </a>
                        </td>
                        </tr>

                        <tr style="display: none;">
                           <td colspan="4">
                              <form action="{{ route('comment.edit', ['id'=>$comment->id]) }}" method="POST">
                                 @csrf
                                 @include('dashboard.comments.form',['row'=>$comment])
                                 <input type="hidden" name="video_id" value="{{ $row->id }}">
                                 <button type="submit" class="btn btn-primary pull-right">Update Comment</button>
                                 <div class="clearfix"></div>
                               </form>
                           </td>
                        </tr>
                @endforeach
        </tbody>
</table>