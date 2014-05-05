<?php

class NoteController extends BaseController{

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

	function upload(){
		$destination = 'upload/';
		$file = Input::file('blob');
		$email = Auth::user()->email;

		//save model to db
		$note = new Echonote;
		$note->title =  Input::get('title');
		$note->url = $destination.$note->title.'-'.$email.'.wav';
		$note->duration =  Input::get('duration');;
		$note->user_id = Auth::user()->id;
		$note->save();

		//create file
		$filename = $note->id.'-'.$note->title.'-'.$email.'.wav';
		$file->move($destination, $filename);

		//resave
		$note->url = $destination.$filename;
		$note->save();

		//save annotations
		$aCount = Input::get('annotation_count');
		for($i=0; $i<$aCount; $i++){
			$index = (string)$i;
			Textannotation::add($note->id, $content, Input::get('timestamps.'.$index));
		}

		$note->tags()->sync(Input::get('tags'));

		return Response::make('Uploaded '.$note->title);
	}

	function delete(){
		$note = Echonote::findOrFail(Input::get('noteId'));
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