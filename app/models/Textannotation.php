<?php

class Textannotation extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'textannotations';
	protected $primaryKey = 'annotationId';
	public $timestamps = false;

	public static function add($noteId, $content, $timestamp){
		$annotation = new Textannotation;
		$annotation->content = $content;
		$annotation->timestamp = $timestamp;
		$annotation->noteid = $noteId;
		$annotation->save();
	}

	public function editContent($content){
		$this->content = $content;
	}
}