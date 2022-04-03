<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Foodchef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $food = Food::all();

        $checf = Foodchef::all();
        return view('frontend.index',compact('food','checf'));
    }

    public function redirects(){
        
        $food = Food::all();
        $checf = Foodchef::all();
        $userType = Auth::user()->usertype;
        
        if($userType=='1'){
            return view('backend.admin.index');
        }

        else{
            return view('frontend.index',compact('food'));
        }
    }
}
