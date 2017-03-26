<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentsController extends Controller
{

	public function admin(){
		$comments = Comment::all();
		return View('comments.admin',compact('comments'));
	}


	public function delete($id){
		$comments = Comment::find($id);
		$comments->delete();
		return Redirect::back()->with('success','Le commentaire à bien été supprimer');
	}



    public function create($id){
    	$post = Post::find($id);
    	$inputs = Input::all();
    	Comment::create([
    		'user_id' => Auth::user()->id,
    		'post_id' => $post->id,
    		'content' => $inputs['comment'],
    		]);
    	return Redirect::back()->with('success','Votre commentaire à bien été poster');
    }
}
