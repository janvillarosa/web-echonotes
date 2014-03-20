<?php

class NoteController extends BaseController{

	function upload(){
		$email = Auth::user()->email;
		$file = Input::file('blob');
		$name = Input::input('title');
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

		$aCount = Input::get('aCount');

		for($i=0; $i<$aCount; $i++){
			$str = (string)$i;
			$annotation = new Textannotation;
			$annotation->content = Input::get('annotations.'.$str);
			$annotation->timestamp = Input::get('timestamps.'.$str);
			$annotation->noteid = $note->noteId;
			$annotation->save();
		}

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