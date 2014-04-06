<?php

class Tag extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';
	protected $primaryKey = 'tagName';
	public $timestamps = false;

	public function echonotes(){
		return $this->belongsToMany('Echonote', 'Echonote_Tag', 'tagName', 'noteId');
	}
}