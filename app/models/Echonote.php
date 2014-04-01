<?php

class Echonote extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'echonotes';
	protected $primaryKey = 'noteId';

	public function textannotation(){
		return $this->hasMany('Textannotation', 'noteId');
	}

	public static function add($file, $duration, $email){
		$name = $file->getClientOriginalName();
		$destination = 'upload/';

		$note = new Echonote;
		$note->noteName =  $name;
		$note->audioURL = $destination.$name.'-'.$email.'.wav';
		$note->duration =  $duration;
		$note->userId = $email;
		$note->save();

		$filename = $note->noteId.'-'.$name.'-'.$email.'.wav';

		$file->move($destination, $filename);

		$note->audiourl = $destination.$filename;
		$note->save();
		
		return $note;
	}

	public function deleteNote(){

		$annotations = $this->textannotation()->get();
		foreach ($annotations as $annotation){
			$annotation->delete();
		}

		$this->delete();
	}

}