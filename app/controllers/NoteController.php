<?php

class NoteController extends BaseController{

	function upload(){
		$note = Echonote::add(Input::file('blob'), Input::get('duration'), Auth::user()->email);

		$aCount = Input::get('aCount');
		for($i=0; $i<$aCount; $i++){
			$index = (string)$i;
			$content = Input::get('annotations.'.$index);
			$content['3']='';
			$content['4']='';
			$content['5']='';
			Textannotation::add($note->noteId, $content, Input::get('timestamps.'.$index));
		}

		$tCount = Input::get('tCount');
		for($i=0; $i<$tCount; $i++){
			$index = (string)$i;
			$note->toggleTag(Input::get('tags.'.$index));
		}

		return Response::make('Uploaded '.$note->noteName);
	}

	function delete(){
		$note = Echonote::where('noteid','=', Input::get('noteid'))->firstOrFail();
		$note->deleteNote();

		return Redirect::to('/');
	}

	function deleteAnnotation(){
		$note = Echonote::where('noteid','=', Input::get('noteid'))->firstOrFail();
		$note->deleteAnnotation();

		return Redirect::to('/');

	}

	function share(){
		$note = Echonote::where('noteid','=', Input::get('noteid'))->firstOrFail();

		$note->shareNote(Input::get('email'));

		//return Response::make('Shared to '.Input::get('email'));
		return Redirect::to('/');
	}
	
}