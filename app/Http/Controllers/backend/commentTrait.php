<?php   
namespace App\Http\Controllers\backend;

use App\Http\Requests\Comment\Store\CommentStore;
use App\Models\Comment;

trait commentTrait{

        public function commentStore(CommentStore $request){
            // dd('asdasd');
            $requestArray = $request->all() + ['user_id'=> auth()->user()->id];
            // dd($requestArray);
             Comment::create($requestArray);
            //  return redirect()->route('videos.edit', $requestArray['video_id']);
            return redirect('admin/videos/'.$requestArray['video_id'].'/edit#comments');

        }

        public function destroyComment($id){
            $row = Comment::findOrFail($id);
            $row->delete();
            return redirect('admin/videos/'.$row->video_id.'/edit#comments');
        }
        
        public function editComment($id, CommentStore $request){
            $row = Comment::findOrFail($id);
            $row->update($request->all());
            return redirect('admin/videos/'.$row->video_id.'/edit#comments');
        }
    }


      