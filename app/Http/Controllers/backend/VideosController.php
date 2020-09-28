<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Video\Store\VideoStore;
use App\Http\Requests\Video\Update\VideoUpdate;
use App\Models\Category;
use App\Models\Skill;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Support\Str;
use SweetAlert;
class VideosController extends backendController {

    use commentTrait;

    public function __construct(Video $model){
        parent::__construct($model);
    }

    protected function with(){
        return ['cat','user'];
    }

    protected function Append(){
        $array = [
            'categories'=>Category::get(),
            'skills'=>Skill::get(),
            'tags'=>Tag::get(),
            'skillSelect'=>[],
            'TagSelect'=>[],
            'comments'=>[],
        ];

        if(request()->route()->parameter('video')){
            $array['skillSelect'] = $this->model->find(request()->route()->parameter('video')
                )->skills()->pluck('skills.id')->toArray();
                $array['TagSelect'] = $this->model->find(request()->route()->parameter('video'))->tags()->pluck('tags.id')->toArray();
                $array['comments'] = $this->model->find(request()->route()->parameter('video'))->comments()->orderBy('id', 'desc')->with('user')->get();
        }
        return $array;
    }

    public function store(VideoStore $request){

        $filename = $this->uploadImage($request);

        $requestArray = ['user_id'=>auth()->user()->id, 'image'=>$filename] + $request->all() ;
        $row = $this->model->create($requestArray);        

        $this->SyncSkillTag($row, $requestArray);
        alert()->success('Success', 'Video Added');
        return redirect()->route('videos.index');
    }

    public function update($id, VideoUpdate $request){

        $requestArray = $request->all();
        if($request->hasFile('image')){
            $filename = $this->uploadImage($request);
            $requestArray = ['image'=>$filename] + $requestArray;
        }       
        $row = Video::findOrFail($id);
        
        $row->update($requestArray);

        alert()->success('Success', 'Video Updated');

        $this->SyncSkillTag($row, $requestArray);

        return redirect('admin/videos/'.$row->id.'/edit');

        }

    protected function SyncSkillTag($row, $requestArray){
        if(isset($requestArray['skills']) && !empty($requestArray['skills'])){
            $row->skills()->sync($requestArray['skills']); 
            }

            if(isset($requestArray['tags']) && !empty($requestArray['tags'])){

            $row->tags()->sync($requestArray['tags']);    

            }
        }

        protected function uploadImage($request){
            $file = $request->file('image');
            $filename = time().str::random(10).'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads') , $filename);
            return $filename;
        }

}