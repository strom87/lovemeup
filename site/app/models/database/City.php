<?php namespace database;

use Eloquent;

class City extends Eloquent {

	protected $table = 'cities';

	protected $fillable = array('state_id', 'name');

}