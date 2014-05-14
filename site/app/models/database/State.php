<?php namespace database;

use Eloquent;

class State extends Eloquent {

	protected $table = 'states';

	protected $fillable = array('country_id', 'name');

}