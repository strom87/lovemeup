<?php namespace image;

class ImageResize {

	public static function resize($filePath, $newWidth, $newHeight)
	{
		$imageInfo = getimagesize(str_replace('\\', '/', $filePath));
		$oldWidth = $imageInfo[0];
		$oldHeight = $imageInfo[1];

		$xRatio = $newWidth / $oldWidth;
		$yRatio = $newHeight / $oldHeight;

		if ($oldWidth <= $newWidth && $oldHeight <= $newHeight) {
			$width = $oldWidth;
			$height = $oldHeight;
		}
		elseif ($yRatio <= $xRatio) {
			$width = round($oldWidth * $yRatio);
			$height = round($oldHeight * $yRatio);
		}
		else {
			$width = round($oldWidth * $xRatio);
			$height = round($oldHeight * $xRatio);
		}

		$oldImage = self::getImageFile($filePath, $imageInfo['mime']);
		$newImage = imagecreatetruecolor($width, $height);
		imagecopyresampled($newImage, $oldImage, 0, 0, 0, 0, $width, $height, $oldWidth, $oldHeight); 
		imagepng($newImage, $filePath); 

		return true;
	}

	private static function getImageFile($filePath, $mimeType)
	{
		switch (strtolower($mimeType)) {
			case 'image/jpg':
				return imagecreatefromjpeg($filePath);
			case 'image/jpeg':
				return imagecreatefromjpeg($filePath);
			case 'image/png':
				return imagecreatefrompng($filePath);
			case 'image/gif':
				return imagecreatefromgif($filePath);
			default:
				return imagecreatefromjpeg($filePath);
		}
	}
}