<?php

use LaravelBook\Ardent\Ardent;

class Textannotation extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'textannotations';

	public static $rules = array(
		'timestamp' => array('required', 'integer'),
		'content' => array('required'),
		'echonote_id' => array('required', 'integer', 'exists:echonotes'),
	);
}