<?php

class NoteController extends BaseController{

	function upload(){
		$email = Auth::user()->email;
		$file = Input::file('blob');
		$name = $file->getClientOriginalName();
		$destination = 'upload/';

		$note = new Echonote;
		$note->notename =  $name;
		$note->audiourl = $destination.$name.'-'.$email.'.wav';
		$note->userid = $email;
		$note->save();

		$filename = $note->noteId.'-'.$name.'-'.$email.'.wav';

		$file->move($destination, $filename);

		$note->audiourl = $destination.$filename;
		$note->save();

		//$annotation = new Textannotation;
		//$annotation->content = Input::get('annotations.0');
		//$annotation->timestamp = Input::get('timestamps.0');;
		//$annotation->noteid = $note->noteId;
		//$annotation->save();

		return Response::make('Uploaded as '.$filename);
	}

	function share($noteid, $email){

		$destination = 'upload/';
		$note = Echonote::where('noteid','=',$noteid)->firstorfail();
		$file = File::get($note->audiourl);

		$file->copy($destination, $name.'.wav');

		$note = new Echonote;

		$note->notename =  $name;
		$note->audiourl = $destination.$name.'.wav';
		$note->userid = $email;
		$note->save();	
	}
}