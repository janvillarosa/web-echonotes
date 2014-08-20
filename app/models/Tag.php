<?php

use LaravelBook\Ardent\Ardent;

class Tag extends Ardent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'tags';

	public function echonote(){
		return $this->belongsToMany('Echonote', 'echonote_tag', 'echonote_id', 'tag_id');
	}
}