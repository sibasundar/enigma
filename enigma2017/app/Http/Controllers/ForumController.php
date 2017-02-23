<?php namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use DB;
use Redirect;
use DateTime;
class ForumController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| College Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the views and php for the Forum application and
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


	public function post(Request $request){

		$user = DB::select('SELECT * FROM users WHERE user_email = ?',[Session::get('email')]);
		$qid = $user['0']->question_id;
		$results = DB::select('SELECT * FROM questions WHERE question_id = ?',[$qid]);
		$answer = $results['0']->answer;
		$ans = $request->input('answer');
		$time = new DateTime();
		if($answer == $ans){
			DB::update('UPDATE users SET question_id = ?, updated_at = ? WHERE user_id = ?',[$qid + 1, $time, $user['0']->user_id]);
			if($qid < 15){
			return Redirect('/questions/question')->with(array(
				'result' => $results['0'],
				'user' => $user['0'],
				'qid' => $qid['0']
				));			
		}
		else{
			return view('/questions/congratulations');
		}
	}
		else{
			\Session::Flash('message','Oops! that is not the correct answer. Try again.');
			return Redirect::back();
		}
		
	}



}