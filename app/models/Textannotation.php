<?php

use LaravelBook\Ardent\Ardent;

class Textannotation extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'textannotations';
	protected $softDelete = true;

	protected $fillable = array('timestamp', 'content', 'echonote_id');

	protected $fillable = array('timestamp', 'content', 'echonote_id');

	public static $rules = array(
		'timestamp' => array('required', 'integer'),
		'content' => array('required'),
		'echonote_id' => array('required', 'integer'),
	);
}