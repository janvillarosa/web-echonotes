<?php

class NoteController extends BaseController{

	function upload(){
		$note = Echonote::add(Input::file('blob'), Input::get('duration'), Auth::user()->email);

		$aCount = Input::get('aCount');
		for($i=0; $i<$aCount; $i++){
			$index = (string)$i;
			$content = Input::get('annotations.'.$index);
			Textannotation::add($note->noteId, $content, Input::get('timestamps.'.$index));
		}
		return Response::make('Uploaded '.$note->noteName);
	}

	function delete(){
		$note = Echonote::where('noteid','=', Input::get('noteid'))->firstOrFail();
		$note->deleteNote();

		return Response::make(' Deleted');
	}


	function share(){

		$destination = 'upload/';
		$cloneNote = Echonote::where('noteid','=', Input::get('noteid'))->firstOrFail();
		$file = File::get($cloneNote->audioURL);

		$note = new Echonote;

		$note->notename =  $cloneNote->name;
		$note->audiourl = $destination.$name.'-'.$email.'.wav';
		$note->duration = $cloneNote->duration;
		$note->userid = Input::get('email');
		$note->save();	

		$filename = $note->noteId.'-'.$note->name.'-'.$note->userid.'.wav';

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