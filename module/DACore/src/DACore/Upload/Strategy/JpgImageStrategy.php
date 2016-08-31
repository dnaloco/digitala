<?php
namespace DACore\Upload\Strategy;

class JpgImageStrategy extends AbstractFileStrategy implements UploadStrategyInterface
{
	protected $source;
	protected $dest;

	public function move($src, $dest, $desired_width)
	{
		$source_image = imagecreatefromjpeg($src);
		$width = imagesx($source_image);
		$height = imagesy($source_image);

		if ($width < $desired_width) return false;
		
		/* find the "desired height" of this thumbnail, relative to the desired width  */
		$desired_height = floor($height * ($desired_width / $width));
		
		/* create a new, "virtual" image */
		$virtual_image = imagecreatetruecolor($desired_width, $desired_height);
		
		/* copy source image at a resized size */
		imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
		
		/* create the physical thumbnail image to its destination */
		imagejpeg($virtual_image, $dest);

		return true;
	}
}