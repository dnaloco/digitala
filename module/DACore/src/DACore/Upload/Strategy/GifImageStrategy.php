<?php
namespace DACore\Upload\Strategy;

class GifImageStrategy extends AbstractFileStrategy implements UploadStrategyInterface
{

	public function move($src, $dest, $desired_width)
	{

		$imagick = new \Imagick($src);

		$imagick = $imagick->coalesceImages();

		$width = $imagick->getImageWidth();
		$height = $imagick->getImageHeight();

		if ($width < $desired_width) return false;

		$desired_height = floor($height * ($desired_width / $width));
		$imagick->resizeImage($desired_width, $desired_height, \Imagick::FILTER_BOX, 1);
		$imagick->writeImage($dest);

		return true;
	}
}