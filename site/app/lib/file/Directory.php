<?php namespace file;

class Directory {

	public static function createUserDirectory($name, $public_path)
	{
		$public_path = join(DIRECTORY_SEPARATOR, array($public_path, 'users', strtolower($name)));
		$image_path = $public_path . DIRECTORY_SEPARATOR . 'images';
		
		mkdir($public_path, 0777);
		mkdir($image_path, 0777);
	}

}