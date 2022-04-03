<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Foodchef;
use App\Models\Reservation;
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
        $food = Food::all();
        return view('backend.admin.foodmenu',compact('food'));
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

    public function foodmenuDelete($id){
        $food =Food::find($id);

        $food->delete();

        return redirect(route('admin.foodmenu'));
    }

    public function foodmenuEdit($id){
        $food =Food::find($id);

        return view('backend.admin.foodmenuUpdate',compact('food'));
    }

    public function foodmenuUpdate(Request $request, $id){
        $food =Food::find($id);
        if($request->has('file')){
            

            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);
            $food->image = $imagename;

        }else if(!$request->has('file')){
            $food->title = $request->title;
            $food->price = $request->price;
            $food->description = $request->description;
        }else{
            $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('foodimage',$imagename);
            $food->image = $imagename;
        }
            
            $food->save();
            return redirect(route('admin.foodmenu'));
    }

    public function reservation(Request $request){

        $reservation = new Reservation();

        $reservation->name = $request->name;
        $reservation->email = $request->email;
        $reservation->phone = $request->phone;
        $reservation->guest = $request->guest;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->message = $request->message;

        $reservation->save();
        return redirect()->back();
    }

    public function reservation_show(){
        $reservation = Reservation::all();

        return view('backend.admin.adminreservation',compact('reservation'));
    }

    public function checf_show(){

        return view('backend.admin.adminchecf');
    }

    public function checf_upload(Request $request){
        
        $checf = new Foodchef();

        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('checfimage',$imagename);
            $checf->image = $imagename;

            $checf->name = $request->name;
            $checf->speciality = $request->speciality;

            $checf->save();
            return redirect()->back();
    }
}
