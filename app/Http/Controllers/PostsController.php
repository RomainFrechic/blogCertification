<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function getIndex(){

    	$posts = Post::paginate(5);
    	return View('posts.index', compact('posts'));
    }

    public function getShow($slug){

    	$post = Post::where('slug',$slug)->firstOrFail();
    	$author = $post->user;
    	$comments = $post->comments;
    	return View('posts.show', compact('post','author', 'comments'));
    }
}
