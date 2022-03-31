<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Food;
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

    public function foodmenu(){
        return view('backend.admin.foodmenu');
    }

    public function foodmenuAdd(Request $request){
        $food = new Food();

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);
            $food->image = $imagename;
            $food->title = $request->title;
            $food->price = $request->price;
            $food->description = $request->description;

            $food->save();
            return redirect(route('admin.foodmenu'));
    }
}
