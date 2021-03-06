<?php

use LaravelBook\Ardent\Ardent;


class Echonote extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'echonotes';
	protected $softDelete = true;

	public $autoPurgeRedundantAttributes = true;

	protected $fillable = array('title', 'url', 'duration','user_id');

	public static $rules = array(
		'title' => array('required','min:1','max:255'),
		'url' => array('required','min:1','max:255'),
		'duration' => array('required','integer'),
		'user_id' => array('required'),
	);

	public function textannotations(){
		return $this->hasMany('Textannotation');
	}

	public function tags(){
		return $this->belongsToMany('Tag', 'echonote_tag', 'echonote_id', 'tag_id');
	}

	public function user(){
		return $this->belongsTo('User');
	}
}