<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Food;
use App\Models\Foodchef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $user_id = Auth::id();
        $count = Cart::where('user_id', $user_id)->count();
        $food = Food::all();
        $checf = Foodchef::all();
        
        return view('frontend.index',compact('food','checf','count'));
    }

    public function redirects(){
        
        $food = Food::all();
        $checf = Foodchef::all();
        $userType = Auth::user()->usertype;
        
        if($userType=='1'){
            return view('backend.admin.index');
        }

        else{
            $user_id = Auth::id();
            $count = Cart::where('user_id', $user_id)->count();
            return view('frontend.index',compact('food','checf','count'));
        }
    }

    public function addcart(Request $request, $id){

        if(Auth::id()){
            $user_id = Auth::id();
            $foodid = $id;
            $quantity = $request->quantity;

            $cart = new Cart();

            $cart->user_id = $user_id;
            $cart->food_id = $foodid;
            $cart->quantity = $quantity;
            $cart->save();

            return redirect()->back();
        }
        else{

            return redirect()->route('login');
        }
    }

    public function show_cart(Request $request,$id){

        $count = cart::where('user_id', $id)->count();
        $cart = cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
        return view('frontend.showcart',compact('count','cart'));
    }
}
