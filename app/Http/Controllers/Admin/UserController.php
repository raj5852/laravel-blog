<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    function index(){
        $users = User::paginate(10);
        return view('admin.user.index',compact('users'));
    }
    function edit($userId){
        $user = User::findOrFail($userId);
        return view('admin.user.edit',compact('user'));

    }
    function update(Request $request ,$userId){
        $user = User::findOrFail($userId);
        $user->role_as =  $request->role_as;
        $user->update();

        return redirect('admin/users')->with('message','Updated successfully!');
    }
}
