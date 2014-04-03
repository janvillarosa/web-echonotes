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

	public function shareNote($email){

		$destination = 'upload/';

		$note = new Echonote;

		$note->noteName =  $this->noteName;
		$note->audioURL = $destination.$note->noteName.'-'.$email.'.wav';
		$note->duration = $this->duration;
		$note->userId = $email;
		$note->save();	

		$filename = $note->noteId.'-'.$note->noteName.'-'.$note->userId.'.wav';

		File::copy($this->audioURL, $destination.$filename);

		$note->audioURL = $destination.$filename;
		$note->save();

		$tAnnotations = $this->textannotation()->get();

		foreach($tAnnotations as $tAnno){
			$annotation = new Textannotation;
			$annotation->content = $tAnno->content;
			$annotation->timestamp = $tAnno->timestamp;
			$annotation->noteId = $note->noteId;
			$annotation->save();
        }

	}

}