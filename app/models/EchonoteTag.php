<?php

class EchonoteTag extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'echonote_tag';
	public $timestamps = false;

	public static function add($noteId, $tagName){
		$echonoteTag =  new EchonoteTag;
		$echonoteTag->noteId = $noteId;
		$echonoteTag->tagName = $tagName;
		$echonoteTag->save();
	}

	public static function deleteFromNote($noteId, $tagName){
		DB::table('Echonote_Tag')->where('noteId', '=', $noteId)->where('tagName', '=', $tagName)->delete();
	}
}