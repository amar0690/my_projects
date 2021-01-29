<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store','destroy']); //For authenticating users.
    }

    public function index()
    {
    	$posts = Post::latest()->with('user','likes')->paginate(5);

    	return view('posts.index', [
    		'posts' => $posts
    	]);
    }

    public function show(Post $post)
    {
        return view('posts.show',[
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
    	//validation
    	$this->validate($request, [
    		'body' => 'required'
    	]);

    	//create data
    	$request->user()->posts()->create([
    		'body' => $request->body
    	]);

    	//redirect
    	return back()->with('status','Successfully Posted !!!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete',$post);

        $post->delete();
        return back()->with('deletestatus','Post Deleted !!!');
    }
}
