<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
    	return View('users.login');
    }
}
