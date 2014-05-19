<?php namespace view\userprofile;

use helpers\Basic;

class ImagesUploadedModel {

	public $images;

	public function __construct($images)
	{
		$this->images = [];

		foreach($images as $image)
		{
			$this->images[] = (object) [
				'id'=>$image->id,
				'path'=>Basic::getUserImagesPathHtml(null, $image->name),
				'is_profile'=>$image->is_profile,
				'is_hidden'=>$image->is_hidden,
				'description'=>$image->description
			];
		}
	}
}