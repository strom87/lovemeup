<?php namespace helpers;

use Auth;

class Basic {

	public static function getYearsRange()
	{
		$year = date('Y') - 18;
		return range($year, 1900, -1);
	}

	public static function getLengthRange()
	{
		return range(200, 50, -1);
	}

	public static function getUserImagesPath()
	{
		return public_path().DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.strtolower(Auth::user()->name).DIRECTORY_SEPARATOR.'images';
	}
}