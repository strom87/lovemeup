<?php namespace helpers;

use Auth;
use database\User;

class Basic {

	public static function calcAge($birthYear = null)
	{
		if (is_null($birthYear))
		{
			$birthYear = Auth::user()->birth_year;
		}

		return date('Y') - $birthYear; 
	}

	public static function calcYear($age)
	{
		return date('Y') - $age;
	}

	public static function getYearsRange()
	{
		$year = date('Y') - 18;
		return range($year, 1900, -1);
	}

	public static function getAgesRange()
	{
		return range(18, 100, 1);
	}

	public static function getLengthRange()
	{
		return range(200, 50, -1);
	}

	public static function getUserImagesFolderPath()
	{
		return public_path().DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.strtolower(Auth::user()->name).DIRECTORY_SEPARATOR.'images';
	}

	public static function getUserImagesPathHtml($username, $imageName)
	{
		if (is_null($username))
		{
			$username = Auth::user()->name;
		}

		if (is_null($imageName))
		{
			return self::noProfileImage();
		}

		$path = 'users/'.strtolower($username).'/images';
		return (object) [
			'large'=>asset($path.'/large/'.$imageName),
			'medium'=>asset($path.'/medium/'.$imageName),
			'small'=>asset($path.'/small/'.$imageName),
		];
	}

	public static function getUserPorfilePictureById($pid)
	{
		return self::getUserPorfilePicture(User::find($pid));
	}

	public static function getUserPorfilePicture(User $user)
	{
		$filename = $user->images()->where('is_profile', true)->pluck('name');
		
		if (empty($filename))
		{
			return self::noProfileImage();
		}
		
		return self::getUserImagesPathHtml($user->name, $filename);
	}

	public static function getUserImagesExceptProfile($user)
	{
		$images = [];
		$path = 'users/'.strtolower($user->name).'/images';

		foreach($user->images()->where('is_profile', '!=', true)->get() as $image)
		{
			$images[] = (object) [
				'description'=>$image->description,
				'large'=>asset($path.'/large/'.$image->name),
				'medium'=>asset($path.'/medium/'.$image->name),
				'small'=>asset($path.'/small/'.$image->name),
			];
		}

		return $images;
	}

	private static function noProfileImage()
	{
		return (object) [
			'large'=>asset('images/no_profile_large.png'),
			'medium'=>asset('images/no_profile_medium.png'),
			'small'=>asset('images/no_profile_small.png')
		];
	}

}