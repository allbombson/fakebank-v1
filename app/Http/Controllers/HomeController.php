<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    //

    function index(Request $request){
        if(User::with('country')->find(Auth::id())){
			$first_name = User::with('country')->find(Auth::id())->first_name;
			$last_name = User::with('country')->find(Auth::id())->last_name;
			$full_name = $first_name . ' ' . $last_name;
		}
		else {
			$full_name = "Login";
		}
        
        return view('home.index', compact('full_name'));

    }


}
