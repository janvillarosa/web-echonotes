<?php

class NoteController extends BaseController{

	function upload(){
		$file = Input::file('blob');
		$name = $file->getClientOriginalName();
		$destination = 'upload/';

		$file->move($destination, $name.'.wav');

		$note = new Echonote;

		$note->notename =  $name;
		$note->audiourl = $destination.$name.'.wav';
		$note->userid = Auth::user()->email;
		$note->save();

		$annotation = new Textannotation;
		$annotation->content = Input::get('annotation');
		$annotation->timestamp = Input::get('timestamp');
		$annotation->noteid = $note->noteId;
		$annotation->save();

		return Response::make('File uploaded in '.$note->audiourl);
	}
}