<?php namespace image;

use image\ImageResize;

class ImageUpload {

	public $errorType;

	protected $imageResize;

	private $extensions = ['png', 'jpg', 'gif'];
	private $mimeTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/pjpeg', 'image/gif'];

	public function __construct(ImageResize $resize)
	{
		$this->imageResize = $resize;
	}

	public function upload($images, $userImagesFolderPath)
	{
		$filenames = [];

		foreach ($images as $image)
		{
			$largeDir = $this->makeLargeImageFolderPath($userImagesFolderPath);

			$filename = $this->generateFileName($largeDir);

			$paths = $this->makeImagePaths($userImagesFolderPath, $filename);

			# move temp image to the users large image folder
			$image->move($largeDir, $filename);

			# copy the large image to the medium and small image folder
			copy($paths['large'], $paths['medium']);
			copy($paths['large'], $paths['small']);

			# resize the large, medium and small images
			$this->imageResize->resize($paths['large'], 1000, 1000);
			$this->imageResize->resize($paths['medium'], 500, 500);
			$this->imageResize->resize($paths['small'], 200, 200);

			$filenames[] = $filename;
		}

		return $filenames;
	}

	public function validate($images)
	{
		$this->errorType = null;

		foreach($images as $image)
		{
			if (!in_array(strtolower($image->getMimeType()), $this->mimeTypes))
			{
				$errorType = 1;
			}

			if (!in_array(strtolower($image->getClientOriginalExtension()), $this->extensions))
			{
				$errorType = 2;
			}

			# 10 MB
			if ($image->getSize() > 10485760)
			{
				$errorType = 3;
			}

			if (!is_null($this->errorType))
			{
				return false;
			}
		}
		
		return true;
	}

	private function makeLargeImageFolderPath($imageFolder)
	{
		return $imageFolder.DIRECTORY_SEPARATOR.'large';
	}

	private function makeImagePaths($imageFolder, $filename)
	{
		return [ 
			'large'  => $imageFolder.DIRECTORY_SEPARATOR.'large'.DIRECTORY_SEPARATOR.$filename,
			'medium' => $imageFolder.DIRECTORY_SEPARATOR.'medium'.DIRECTORY_SEPARATOR.$filename,
			'small'  => $imageFolder.DIRECTORY_SEPARATOR.'small'.DIRECTORY_SEPARATOR.$filename
		];
	}

	private function generateFileName($imageFolder)
	{
		while (true) 
		{
			$filename = strtolower(str_random(20).'.png');

			if (!file_exists($imageFolder.DIRECTORY_SEPARATOR.$filename))
			{
				return $filename;
			}
		}
	}
}