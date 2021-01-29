<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['guest']); //If user is logged in, he wont be able to access any method mentioned below.
    }
    
    public function index()
    {
    	return view('auth.register');
    }

    public function store(Request $request)
    {
    	//validation
    	$this->validate($request, [
    		'name' => 'required|max:255',
    		'username' => 'required|max:255',
    		'email' => 'required|email|max:255',
    		'password' => 'required|confirmed'
    	]);

    	//store user in db
    	User::create([
    		'name' => $request->name,
    		'username' => $request->username,
    		'email' => $request->email,
    		'password' => Hash::make($request->password)
    	]);

    	//sign in
    	if(auth()->attempt($request->only('email','password')))
    	{
	    	//redirect
	    	return redirect()->route('dashboard')->with('status','You have successfully registered !!!');
    	}
    	else
    	{
    	    //redirect
    		return redirect()->route('register');	
    	}


    }
}
