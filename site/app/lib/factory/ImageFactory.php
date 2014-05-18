<?php namespace factory;

use database\User;
use database\Image;
use validator\ValidatorMod;
use validator\ValidatorRules;

class ImageFactory extends ValidatorMod {

	public $images;

	public function __construct()
	{
		parent::__construct();

		$this->images = [];
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

		$this->images[] = $image;
	}

	public function update($pid, $iid, $attributes)
	{
		$this->validate($attributes, ValidatorRules::updateImage(), false);

		if ($this->failed()) return false;

		$images = User::find($pid)->images();

		if (isset($attributes['is_profile']))
		{
			$images->update(['is_profile'=>false]);
		}

		$image = $images->find($iid)->update([
			'description'=>$attributes['description'],
			'is_profile'=>$attributes['is_profile'] == 'true',
			'is_hidden'=>$attributes['is_hidden'] == 'true'
		]);

		return true;
	}
}