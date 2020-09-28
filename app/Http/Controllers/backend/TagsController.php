<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Tag\Store\TagStore;
use App\Models\Tag;
use Illuminate\Http\Request;
use SweetAlert;

class TagsController extends backendController{
    public function __construct(Tag $model){
        parent::__construct($model);
    }

    public function store(TagStore $request){
        $row = Tag::create([
            'name'=>$request->name,
        ]);
        alert()->success('Success', 'Tag Added');
        return redirect()->route('tags.index');
    }

    public function update($id, Request $request){
        $row = Tag::findOrFail($id);
        $row->update([
            'name'=>$request->name,
            ]);

        $row->save();
        alert()->success('Success', 'Tag Updated');
        return redirect()->route('tags.index');
        
        }
}
