<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	function home(){                              
		if(Input::has('q')){
			$notes = Auth::user()->echonotes()->where('title','like','%'.$q.'%')->orderBy('updated_at', 'desc')->get();
		}
		else if(Input::has('tag')){
			$notes = Auth::user()->echonotes()->whereHas("Tags", function($q){
                                    $q->where('Tags.id', '=', Input::get('tag'));
                                })->orderBy('updated_at', 'desc')->get();
		}
		else{
			$notes = Auth::user()->echonotes()->orderBy('updated_at', 'desc')->get();
		}
		return View::make('homepage')->withNotes($notes);
	}

	function viewNote($noteId){
		$note = Echonote::findOrFail($noteId);
		if($note->user_id === Auth::user()->id){
			return View::make('note')->withNote($note);
		}
		else{
			return Redirect::to('/');
		}
	}

	function record(){
		return View::make('record');
	}
}