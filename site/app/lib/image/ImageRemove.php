<?php namespace image;

class ImageRemove {

	public static function remove($userImageFolderPath, $filename)
	{
		$paths = self::makeImagePaths($userImageFolderPath, $filename);

		copy($paths['large'], $paths['deleted']);

		unlink($paths['large']);
		unlink($paths['medium']);
		unlink($paths['small']);
	}

	private static function makeImagePaths($imageFolder, $filename)
	{
		return [ 
			'large'  	=> $imageFolder.DIRECTORY_SEPARATOR.'large'.DIRECTORY_SEPARATOR.$filename,
			'medium' 	=> $imageFolder.DIRECTORY_SEPARATOR.'medium'.DIRECTORY_SEPARATOR.$filename,
			'small'  	=> $imageFolder.DIRECTORY_SEPARATOR.'small'.DIRECTORY_SEPARATOR.$filename,
			'deleted'  	=> $imageFolder.DIRECTORY_SEPARATOR.'deleted'.DIRECTORY_SEPARATOR.$filename
		];
	}

}