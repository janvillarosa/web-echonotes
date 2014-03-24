<?php

class NoteController extends BaseController{

	function upload(){
		$email = Auth::user()->email;
		$file = Input::file('blob');
		$name = $file->getClientOriginalName();
		$destination = 'upload/';

		$note = new Echonote;
		$note->noteName =  $name;
		$note->audioURL = $destination.$name.'-'.$email.'.wav';
		$note->userId = $email;
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

	function share(){

		$destination = 'upload/';
		$cloneNote = Echonote::where('noteid','=', Input::get('noteid'))->firstOrFail();
		$file = File::get($cloneNote->audiourl);

		$note = new Echonote;

		$note->notename =  $cloneNote->name;
		$note->audiourl = $destination.$name.'-'.$email.'.wav';
		$note->userid = Input::get('email');
		$note->save();	

		$filename = $note->noteId.'-'.$note->name.'-'.$email.'.wav';

		$file->copy($destination, $name.'.wav');

		$note->audiourl = $destination.$filename;
		$note->save();

		$tAnnotations = Textannotation::where('noteid','=', $note->noteId)->get();

		foreach($tAnnotations as $tAnno){
			$annotation = new Textannotation;
			$annotation->content = $tAnno->content;
			$annotation->timestamp = $tAnno->timestamp;
			$annotation->noteid = $note->noteId;
			$annotation->save();
        }

	}
}