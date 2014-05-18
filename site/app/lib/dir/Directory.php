<?php namespace dir;

class Directory {

	public static function createUserDirectory($name, $publicPath)
	{
		$publicPath = $publicPath.DIRECTORY_SEPARATOR.'users'.DIRECTORY_SEPARATOR.strtolower($name);
		$imagePath = $publicPath.DIRECTORY_SEPARATOR.'images';

		$large = $imagePath.DIRECTORY_SEPARATOR.'large';
		$medium = $imagePath.DIRECTORY_SEPARATOR.'medium';
		$small = $imagePath.DIRECTORY_SEPARATOR.'small';
		$deleted = $imagePath.DIRECTORY_SEPARATOR.'deleted';

		mkdir($publicPath, 0777);
		mkdir($imagePath, 0777);
		mkdir($large, 0777);
		mkdir($medium, 0777);
		mkdir($small, 0777);
		mkdir($deleted, 0777);
	}

}