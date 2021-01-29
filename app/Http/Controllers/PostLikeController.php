<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Like;
use App\Mail\PostLiked;
use Illuminate\Support\Facades\Mail;

class PostLikeController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']); //For authenticating users.
    }

    public function store(Post $post, Request $request)
    {
    //Checking liked/unliked by user at controller level
    	/*if($post->likedBy($request->user()))
    	{
    		return back();
    	}*/

    //Creating like and saving to DB
    	$post->likes()->create([
    		'user_id' => $request->user()->id
    	]);

        //checking if the post has been liked before to prevent USER from email spam
        if( !$post->likes()->onlyTrashed()->where( 'user_id', $request->user()->id )->count() )
        {
            //Sending mail to user whose post has been liked
            Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));

            return back()->with('likestatus','Post liked !!!')->with('mailstatus','Mail Sent !!!');         
        }
        else
        {
            return back()->with('likestatus','Post liked !!!');
        }
    }

    public function destroy(Post $post, Request $request)
    {
    	$request->user()->likes()->where('post_id', $post->id)->delete();

    	return back()->with('unlikestatus','Post unliked !!!');
    }
}
