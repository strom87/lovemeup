<?php namespace helpers;

use Auth;
use database\User;

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

	public static function getUserImagesFolderPath()
	{
		return public_path().DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.strtolower(Auth::user()->name).DIRECTORY_SEPARATOR.'images';
	}

	public static function getUserImagesPathHtml($imageName)
	{
		$path = 'users/'.strtolower(Auth::user()->name).'/images';
		return (object) [
			'large'=>asset($path.'/large/'.$imageName),
			'medium'=>asset($path.'/medium/'.$imageName),
			'small'=>asset($path.'/small/'.$imageName),
		];
	}

	public static function getUserPorfilePicture(User $user)
	{
		$filename = $user->images()->where('is_profile', true)->pluck('name');
		
		if (empty($filename))
		{
			return (object) [
				'large'=>asset('images/no_profile_large.png'),
				'medium'=>asset('images/no_profile_medium.png'),
				'small'=>asset('images/no_profile_small.png')
			];
		}
		
		return self::getUserImagesPathHtml($filename);
	}

}