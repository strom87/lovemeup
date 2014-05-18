<?php namespace factory;

use database\User;
use database\Image;
use validator\ValidatorMod;
use validator\ValidatorRules;

class ImageFactory extends ValidatorMod {

	public function __construct()
	{
		parent::__construct();
	}

	public function make($pid, $name)
	{
		$image = new Image([
			'name'=>$name,
			'description'=>'',
			'is_profile'=>false,
			'is_hidden'=>false
		]);

		User::find($pid)->images()->save($image);
	}

}