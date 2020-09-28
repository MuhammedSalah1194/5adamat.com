<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Page\Store\PageStore;
use App\Models\Page;
use Illuminate\Http\Request;
use SweetAlert;

class PagesController extends backendController{
    public function __construct(Page $model){
        parent::__construct($model);
    }

    public function store(PageStore $request){
        $row = Page::create([
            'name'=>$request->name,
            'keywords'=>$request->keywords,
            'desc'=>$request->desc,
            'meta_desc'=>$request->meta_desc,
        ]);
        alert()->success('Success', 'Page Added');

        return redirect()->route('pages.index');
    }

    public function update($id, Request $request){
        $row = Page::findOrFail($id);
        $row->update([
            'name'=>$request->name,
            'keywords'=>$request->keywords,
            'desc'=>$request->desc,
            'meta_desc'=>$request->meta_desc,
        ]);
        $row->save();
        alert()->success('Success', 'Page Updated');
        return redirect()->route('pages.index');
        
        }
}