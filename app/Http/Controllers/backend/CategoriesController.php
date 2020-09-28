<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Category\Store\CatStore;
use App\Models\Category;
use Illuminate\Http\Request;
use SweetAlert;

class CategoriesController extends backendController{
    public function __construct(Category $model){
        parent::__construct($model);
    }

    public function store(CatStore $request){
        $row = Category::create([
            'name'=>$request->name,
            'keywords'=>$request->keywords,
            'desc'=>$request->desc,
        ]);
        alert()->success('Success', 'Categories Added');
        return redirect()->route('categories.index');
    }

    public function update($id, Request $request){
        $row = Category::findOrFail($id);
        $row->update([
            'name'=>$request->name,
            'keywords'=>$request->keywords,
            'desc'=>$request->desc,
            ]);

        $row->save();
        alert()->success('Success', 'Categories Updated');
        return redirect()->route('categories.index');
        
        }
}
