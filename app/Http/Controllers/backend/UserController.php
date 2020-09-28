<?php

namespace App\Http\Controllers\backend;
use App\Http\Requests\User\Store\UserStore;
use App\Http\Requests\User\Update\UserUpdate;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use SweetAlert;
class UserController extends backendController{
    
    public function __construct(User $model){
        parent::__construct($model);
    }


    // protected function Filter($rows){
    //     if(request()->has('name') && request()->get('name') !=''){
    //         $rows = $rows->where('name', request()->get('name') );
    //     }
    //     return $rows;
    // }

    public function store(UserStore $request){
        $row = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'group'=>$request->group,

        ]);
        alert()->success('Success', 'User Added');
        return redirect()->route('users.index');
    }

    public function update($id, UserUpdate $request){
        $row = User::findOrFail($id);
        $requestArray = [
            'name'=>$request->name,
            'email'=>$request->email,
            'group'=>$request->group,
         ];

        if(request()->has('password') && request()->get('password') !='' && request()->get('password') !=' ' && request()->get('password') != null){
            $requestArray = $requestArray + ['password'=>Hash::make($request->password)];
        }
        $row->update($requestArray);
        alert()->success('Success', 'User Updated');
        return redirect()->route('users.index');

        }
   

}