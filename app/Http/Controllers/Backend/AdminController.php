<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user(){
        $user = User::all();
        return view('backend.admin.users.index',compact('user'));
    }

    public function deleteuser($id){
        $user = User::find($id);
        $user->delete();

        return redirect(route('admin.users'));
    }
}
