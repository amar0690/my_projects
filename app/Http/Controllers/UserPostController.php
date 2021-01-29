<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;

class UserPostController extends Controller
{
    public function index(User $user)
    {
    	$posts = $user->posts()->with('user','likes')->paginate(5);

    	return view('users.posts.index',[
    		'user' => $user,
    		'posts' => $posts
    	]);
    	//dd($user);
    }
}
