<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostsController extends Controller
{




    public function getIndex(){

    	$posts = Post::paginate(6);
    	return View('posts.index', compact('posts'));
    }






    public function getShow($slug){

    	$post = Post::where('slug',$slug)->firstOrFail();
    	$author = $post->user;
    	$comments = $post->comments;
    	return View('posts.show', compact('post','author', 'comments'));
    }






    public function admin(){

        $posts = Post::all();
        return View('posts.admin',compact('posts'));
    }






    public function edit($id){

        $post = Post::find($id);
        if($post){

            return View('posts.edit',compact('post'));    
        }else{
           return View('posts.create');
       }
   }

   


   public function delete($id){

    $post = Post::find($id);
    $post->destroy($post->id);
    return Redirect::back()->with('success','Votre post à bien été supprimé');
}





public function update($id){

    $inputs = Input::all();
    $validation = Validator::make($inputs,[
        'name'=>'required | min:3',
        'content'=>'required | min:5',
        ]);
    if($validation->fails()){
        return Redirect::back()->withErrors($validation);
    }else{
        
        $post = Post::find($id);
        $post->name = $inputs['name'];
        $post->content = $inputs['content'];
        $post->slug = Str::slug($inputs['name']);
        $post->save();
        return Redirect::back()->with('success','Votre post à bien été modifier');  
    }
}






public function addPost($id){

    $inputs = Input::all();
    $validation = Validator::make($inputs,[
        'name'=>'required | min:3',
        'content'=>'required | min:5',
        ]);
    if($validation->fails()){
        return Redirect::back()->withErrors($validation);
    }else{

        $post = Post::create([
            'name' => $inputs['name'],
            'content' => $inputs['content'],
            'slug' => Str::slug($inputs['name']),
            'user_id' => Auth::user()->id,
            ]); 
        $post->save();
        return Redirect::route('posts.edit',$post->id)->with('success','Votre post à bien été créer'); 
        
    }
}



}
