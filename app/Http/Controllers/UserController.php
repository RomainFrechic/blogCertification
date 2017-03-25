<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{

	public function login(){
		return View('users.login');
	}

	public function check(){

		$inputs =  Input::all();
		if(Input::get('remenber')){
			$remenber = true;
		}else{
			$remenber = false;
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


	public function register(){

		return View('users.register');
	}

	public function store(){

		$inputs['email'] = e(Input::get('email'));
		$inputs['username'] = e(Input::get('username'));
		$inputs['password'] = e(Input::get('password'));
		$inputs['password_confirm'] = e(Input::get('password_confirm'));
		$validation = Validator::make($inputs,[
			'email'=>'required|min:3|unique:users',
			'username'=>'required|min:3|unique:users',
			'password'=>'required|min:4',
			'password_confirm'=>'same:password',

			]);
		if($validation->fails()){
			return Redirect::back()->withErrors($validation);
		}else{
			$user = User::create([
					'email'=>$inputs['email'],
					'username'=>$inputs['username'],
					'password'=>Hash::make($inputs['password']),

				]);
			$user->save();
			return Redirect::route('users.login')->with('success','Vous pouvez maintenant vous connectez');
		}

	}

	  
}
