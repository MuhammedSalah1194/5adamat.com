<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use illuminate\Http\Request;
use Illuminate\Support\Str;

class backendController extends Controller{
    
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;    
    }

    public function index(){
        $rows = $this->model;
        $rows = $this->Filter($rows);
        $with = $this->with();
           if(!empty($with)){
               $rows = $rows->with($with);
           }
        $rows = $rows->paginate(10);
        $page_title = $this->Plural();
        $page_desc = 'Control ' . $page_title;
        $singular = $this->getSingleName();
        $folderName = $this->getClassName();
        return view('dashboard.'.$folderName.'.index', compact('rows','page_title','page_desc','singular','folderName'));
    }

    public function create(){
        $page_title = $this->getSingleName();
        $page_desc = 'Create ' . $page_title;
        $folderName = $this->getClassName();
        $append = $this->Append();
        return view('dashboard.'.$folderName.'.create' , compact('page_title','page_desc','folderName'))->with($append);
    }

    public function edit($id){  
        $page_title = $this->getSingleName();
        $page_desc = 'Edit ' . $page_title;
        $row = $this->model->findOrFail($id);
        $folderName = $this->getClassName();
        $append = $this->Append();
        return view('dashboard.'.$folderName.'.edit', compact('row','page_title','page_desc','folderName'))->with($append);
    }

    public function destroy($id){
        $row = $this->model->findOrFail($id);
        $row->delete();
        return redirect()->route($this->getClassName().'.index');
    }

    protected function getClassName(){
        return strtolower($this->Plural());
    }

    protected function Plural(){
        return str::plural($this->getSingleName());
    }

    protected function getSingleName(){
        return class_basename($this->model);
    }

    protected function Filter($rows){
        // dd($rows);
        return $rows;
    }

    protected function with(){
        return [];
    }

    protected function Append(){
        return [];
    }
}