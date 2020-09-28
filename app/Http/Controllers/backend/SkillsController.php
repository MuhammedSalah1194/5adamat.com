<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\Skill\Store\SkillStore;
use App\Models\Skill;
use Illuminate\Http\Request;
use SweetAlert;

class SkillsController extends backendController{
    public function __construct(Skill $model){
        parent::__construct($model);
    }

    public function store(SkillStore $request){
        $row = Skill::create([
            'name'=>$request->name,
        ]);
        alert()->success('Success', 'Skill Added');
        return redirect()->route('skills.index');
    }

    public function update($id, Request $request){
        $row = Skill::findOrFail($id);
        $row->update([
            'name'=>$request->name,
            ]);

        $row->save();
        alert()->success('Success', 'Skill Updated');
        return redirect()->route('skills.index');
        
        }
}
