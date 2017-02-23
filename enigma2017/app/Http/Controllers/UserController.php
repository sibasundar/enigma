<?php

namespace App\Http\Controllers;

use Session;
use Socialize;
use Illuminate\Http\Request;
use Hash;
use DB;
use Mail;

class UserController extends Controller
{
    public function __construct()
	{
		$this->middleware('guest');
	}
	public function home()
	{
		return view('/welcome');
	}
	public function index()
	{
		if (Session::has('email'))
		{	
			$user = DB::select('SELECT * FROM users WHERE user_email = ?',[Session::get('email')]);
		    return redirect('/')->with(array(
		    	'user' => $user,
		    	));
		}
		return view('welcome')->with(array('error' => ''));
	}
	public function login(Request $request)
	{
		$email = $request->input('email');
		$password = $request->input('password');
		if(isset($_POST['ambassador']))
		{
			$hashed = DB::select('SELECT ambassadors_password,ambassadors_email FROM ambassadors WHERE ambassadors_email = ?',[$email]);
			if (count($hashed) == 0)
			{
				\Session::Flash('message','There is no account with this email.Please try again.');				
				return redirect('/landing');
			}
			else
			if(Hash::check($password,$hashed['0']->ambassadors_password))
			{
				Session::put('email',$hashed['0']->ambassadors_email);
				\Session::Flash('message','You are successfully logged in');
				return redirect('ambs/home');
			}
			else
			{
				\Session::Flash('message','Incorrect password and try again.');				
				return redirect('/');
			}
		}
		else
		{
			$hashed = DB::select('SELECT user_password,user_email FROM users WHERE user_email = ?',[$email]);
			if (count($hashed) == 0)
			{
				\Session::Flash('message','There is no account with this email.Please try again.');				
				return redirect('/landing');
			}
			else
			if(Hash::check($password,$hashed['0']->user_password))
			{
				Session::put('email',$hashed['0']->user_email);
				$user = DB::select('SELECT * FROM users WHERE user_email = ?',[Session::get('email')]);
				\Session::Flash('message','You are successfully logged in');				
				return redirect('/')->with(array(
					'user' => $user
					));
			}
			else
			{
				\Session::Flash('message','Incorrect password and try again');				
				return redirect('/landing');				
			}
		}
	}
	public function register(Request $request)
	{	
		$email = $request->input('email');
		$name = $request->input('name');
		$password = $request->input('password');
		$mobile = $request->input('mobile');
		$confirmation_code = str_random(30);
		$rows = DB::select('SELECT * FROM users WHERE user_email = ?',[$email]);
		$rows1 = DB::select('SELECT * FROM users WHERE user_name = ?',[$name]);
		if(count($rows) == 0 && count($rows1) == 0){
			$password = Hash::make($password);
			DB::insert('INSERT INTO users (user_name,user_email,user_password,mobile_number,question_id,confirmation_code) VALUES(?,?,?,?,?,?)',[$name,$email,$password,$mobile,1,$confirmation_code]);
			$hashed = DB::select('SELECT user_password,user_email FROM users WHERE user_email = ?',[$email]);
			Session::put('email',$hashed['0']->user_email);
			return redirect('/landing');
		}
		else
			if(count($rows) != 0)
			{
			\Session::Flash('message','A user with that email id is already registered! Please sign up with a different email id.');
			return redirect('/landing');
		}
		else
		if(count($rows1) != 0)
		{
			\Session::Flash('message','A user with that Username is already registered! Please try a different Username.');
			return redirect('/landing');				
		}

		
	}
	public function signout()
	{
		Session::forget('user_email');
		return redirect('/');
	}
}
