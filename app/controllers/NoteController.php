<?php

class NoteController extends BaseController{

	function upload(){
		$destination = 'upload/';
		$file = Input::file('blob');
		$email = Auth::user()->email;

		//save model to db
		$note = new Echonote;
		$note->title =  Input::get('title');
		$note->url = $destination.$note->title.'-'.$email.'.wav';
		$note->duration =  Input::get('duration');
		$note->user_id = Auth::user()->id;
		if(!$note->save()){
			return $note->errors()->first();
		}

		//create file
		$filename = $note->id.'-'.$note->title.'-'.$email.'.wav';
		$file->move($destination, $filename);

		//resave
		$note->url = $destination.$filename;
		if(!$note->save()){
			return $note->errors()->first();
		}

		//save annotations
		$aCount = Input::get('annotation_count');
		for($i=0; $i<$aCount; $i++){
			$index = (string)$i;
			$annotation = new Textannotation;
			$annotation->timestamp = Input::get('timestamps.'.$index);
			$annotation->content = Input::get('annotations.'.$index);
			$annotation->echonote_id = $note->id;

			$annotation->save();
		}

		$tCount = Input::get('tCount');
		for($i=0; $i<$tCount; $i++){
			$index = (string)$i;
			$note->tags()->attach(Input::get('tags.'.$index));
		}

		return Response::make('Uploaded '.$note->title);
	}

	function delete(){
		$note = Auth::user()->echonotes()->where('id',Input::get('noteId'));
		$note->delete();

		return Redirect::to('/');
	}

	public function deleteAnnotation($annotationId){
		$annotation = findOrFail($annotationId);
		$annotation->delete();

		return Redirect::to('/');

	}

	function share(){
		$noteToBeShared = Echonote::findOrFail(Input::get('noteId'));
		$emailDestination = Input::get('email');

		$destination = 'upload/';

		//save model to db
		$note = new Echonote;
		$note->title =  $noteToBeShared->title;
		$note->url = $destination.$note->title.'-'.$emailDestination.'.wav';
		$note->duration =  $noteToBeShared->duration;
		$note->user_id = User::where('email', $emailDestination)->first()->id;
		$note->save();	

		//create file
		$filename = $note->id.'-'.$note->title.'-'.$emailDestination.'.wav';
		File::copy($noteToBeShared->url, $destination.$filename);

		//resave
		$note->url = $destination.$filename;
		$note->save();

		//clone annotations
		$annotations = $noteToBeShared->textannotations()->get();

		foreach($annotations as $annotation){
			$a = new Textannotation;
			$a->content = $annotation->content;
			$a->timestamp = -$annotation->timestamp;
			$note->textannotations()->save($a);
        }

        $note->tags()->sync($noteToBeShared->tags);
        $note->tags()->attach('Shared');

		return Redirect::to('/');
	}
}