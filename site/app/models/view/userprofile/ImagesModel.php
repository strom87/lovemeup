<?php namespace view\userprofile;

use Auth;
use database\User;
use helpers\Basic;

class ImagesModel {
	
	public $images;

	public function __construct()
	{
		$tempImages = [];
		$user = User::find(Auth::user()->id);
		$userImages = $user->images;

		foreach($userImages as $image)
		{
			$tempImages[] = (object) [
				'id'=>$image->id,
				'description'=>$image->description,
				'paths'=>Basic::getUserImagesPathHtml($user->name, $image->name),
				'is_profile'=>$image->is_profile,
				'is_hidden'=>$image->is_hidden
			];
		}

		$this->images = (object) $tempImages;
	}
}