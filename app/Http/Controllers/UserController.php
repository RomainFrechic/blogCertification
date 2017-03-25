<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function login(){
    	return View('users.login');
    }

    public function check(){

    	$inputs =  Input::all();
    	if($inputs['remenber']){
    		$remenber = true;
    	}
    	$inputs['username'] = e($inputs['username']);
    	$inputs['password'] = e($inputs['password']);
    	$validation = Validator::make($inputs,[
    			'username'=>'required',
    			'password'=>'required',
    		]);

    	if($validation->fails()){
    		 return Redirect::back()->withErrors($validation);
    	}else{
    		if(Auth::attempt(['username'=>$inputs['username'],'password'=>$inputs['password']],$remenber)){

    			Auth::attempt(['username'=>$inputs['username'],'password'=>$inputs['password']],$remenber);

    			return Redirect::route('home')->with('success', 'Vous êtes bien connectés');

    		}else{
    			return Redirect::back()->with('error', "Le mot de passe ou le nom de l'utilisateur est incorrect");
    		}
    	}

    }

    public function logout(){
    	Auth::logout();
    	return Redirect::route('home')->with('success','Vous êtes maintenant déconnecté');
    }
}
