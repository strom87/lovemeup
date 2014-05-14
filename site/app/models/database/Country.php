<?php namespace database;

use Eloquent;

class Country extends Eloquent {

	protected $table = 'countries';

	protected $fillable = array('name');

}