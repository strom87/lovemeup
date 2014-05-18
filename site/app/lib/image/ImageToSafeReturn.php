<?php namespace image;

use helpers\Basic;

class ImageToSafeReturn {

	public $images;

	public function __construct($images)
	{
		$this->images = [];

		foreach($images as $image)
		{
			$this->images[] = (object) [
				'id'=>$image->id,
				'path'=>Basic::getUserImagesPathHtml($image->name),
				'is_profile'=>$image->is_profile,
				'is_hidden'=>$image->is_hidden,
				'description'=>$image->description
			];
		}
	}
}