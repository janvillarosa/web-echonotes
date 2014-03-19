<?php

class NoteController extends BaseController{

	function upload(){
		$email = Auth::user()->email;
		$file = Input::file('blob');
		$name = $file->getClientOriginalName();
		$destination = 'upload/';

		$note = new Echonote;

		$note->notename =  $name;
		$note->audiourl = $destination.$name.'.wav';
		$note->userid = $email;
		$note->save();


		$filename = $note->noteId.'-'.$name.'-'.$email.'.wav';

		$file->move($destination, $filename);

		$aCount = Input::get('aCount');

		//for($i = 0; $i < aCount; $i++){
			$annotation = new Textannotation;
			$annotation->content = Input::get('annotations.0');
			$annotation->timestamp = Input::get('timestamps.0');
			$annotation->noteid = $note->noteId;
			$annotation->save();
		//}

		return Response::make('Uploaded as '.$filename);
	}
}