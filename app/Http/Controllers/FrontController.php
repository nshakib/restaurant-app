<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function redirects(){
        
        $userType = Auth::user()->usertype;
        
        if($userType=='1'){
            return view('backend.admin.index');
        }

        else{
            return view('frontend.index');
        }
    }
}
