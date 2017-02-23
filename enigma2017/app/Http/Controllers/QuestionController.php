<?php namespace App\Http\Controllers;
use Session;
use DB;
use Hash;
use Illuminate\Http\Request;
class QuestionController extends Controller { 

	/*
	|--------------------------------------------------------------------------
	| College Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the views and php for the ambassador application and
	| fetches data from the database to display
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function viewQuestion()
	{
		
		if(Session::has('email')){
			$user = DB::select('SELECT * FROM users WHERE user_email = ?',[Session::get('email')]);
			$qid = $user['0']->question_id;
			$results = DB::select('SELECT * FROM questions WHERE question_id = ?',[$user['0']->question_id]);	
			$leader = DB::select('SELECT * FROM users ORDER BY question_id DESC, updated_at');	
			return view('/questions/question')->with(array(
				'result' => $results['0'],
				'user' => $user['0'],
				'leader' => $leader,
				'qid' => $qid['0']
				));
		}else{
			return redirect('/');
		}
	}

	public function viewCongratulations()
	{
		return view('questions/congratulations');
	}



/*	public function notification()
	{
		
		return view('ambassadors/notification');
	}

	public function profile()
	{
		
		return view('ambassadors/profile');
	}

	public function editProfile(Request $request)
	{
		$ambassador = DB::select('SELECT * FROM ambassadors WHERE ambassadors_email = ?',[Session::get('email')]);	
		$name = $request->input('name');
		$email = $request->input('email');
		$mobile = $request->input('mobile');
		if ($email == $ambassador['0']->ambassadors_email)
		{
			DB::update('UPDATE ambassadors SET ambassadors_name = ?, ambassadors_email = ?, mobile_number = ? WHERE ambassadors_email = ?',[$name,$email,$mobile,Session::get('email')]);
			return redirect()->back();
		}
		else
		{
			DB::update('UPDATE ambassadors SET ambassadors_name = ?, ambassadors_email = ?, mobile_number = ? WHERE ambassadors_email = ?',[$name,$email,$mobile,Session::get('email')]);
			Session::forget('email');
			return redirect('signout');
		}	
	}

	public function settings()
	{
		$ambassador = DB::select('SELECT * FROM ambassadors WHERE ambassadors_email = ?',[Session::get('email')]);
		return view('ambassadors/settings')->with(array(
			'ambassador' => $ambassador['0']
			));
	}

	public function saveSettings(Request $request)
	{
		$intro = $request->input('ambs_intro');

		DB::update('UPDATE ambassadors SET ambassadors_intro = ? WHERE ambassadors_email = ?',[$intro,Session::get('email')]);

		return redirect('ambs/settings');
	}

	public function password(Request $request)
	{
		$ambassador = DB::select('SELECT * FROM ambassadors WHERE ambassadors_email = ?',[Session::get('email')]);
		$old_password = $request->input('old_password');
		$new_password = $request->input('new_password');
		$confirm_password = $request->input('confirm_password');
		if (!(Hash::check($old_password,$ambassador['0']->ambassadors_password))) 
		{
			\Session::Flash('message','Incorrect password.Please try Again.');			
		}
		else if ($new_password != $confirm_password)
		{
			\Session::Flash('message','New passwords do not match.Please try again.' );			
		}
		else if ((Hash::check($old_password,$ambassador['0']->ambassadors_password) && ($new_password == $confirm_password)))
		{	
			$password = Hash::make($new_password);	
			DB::update('UPDATE ambassadors SET ambassadors_password	= ? WHERE ambassadors_email = ?',[$password,Session::get('email')]);
			\Session::Flash('message','Your Password has been changed successfully.');
		}

		return redirect('ambs/settings');
	} */

	public function signout()
	{
		Session::forget('email');
		return view('signout');
	}
	

}