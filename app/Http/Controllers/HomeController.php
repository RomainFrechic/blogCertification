<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
   public function admin(){
   	  		if(Auth::check()){
   	  			return View('admin');
   	  		}else{
   	  			Redirect::route('users.login')->with('error','Vous devez être connecté pour accéder à cette page');
   	  		}
   }
}
