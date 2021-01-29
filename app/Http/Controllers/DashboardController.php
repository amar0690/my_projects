<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PostLiked;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']); //For authenticating users.
    }

    public function index()
    {
    	if(!auth()->user())
    	{
    		return redirect()->route('home');
    	}

    	//dd(auth()->user()->posts);

    	return view('dashboard');
    }
}
