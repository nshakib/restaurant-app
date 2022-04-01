<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        $food = Food::all();
        return view('frontend.index',compact('food'));
    }

    public function redirects(){
        
        $food = Food::all();
        $userType = Auth::user()->usertype;
        
        if($userType=='1'){
            return view('backend.admin.index');
        }

        else{
            return view('frontend.index',compact('food'));
        }
    }
}
