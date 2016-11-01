<?php
namespace DACore\Aware\Upload\Strategy;

class PngImageStrategy extends AbstractFileStrategy implements UploadStrategyInterface
{

	public function move($src, $dest, $desired_width)
	{

                $source_image = imagecreatefrompng($src);

                $width = imagesx($source_image);
                $height = imagesy($source_image);

                if ($width < $desired_width) return false;

                /* find the "desired height" of this thumbnail, relative to the desired width  */
                $desired_height = floor($height * ($desired_width / $width));

                /* create a new, "virtual" image */
                $virtual_image = imagecreatetruecolor($desired_width, $desired_height);

                imagealphablending($virtual_image, true);

                $transparent = imagecolorallocatealpha( $virtual_image, 0, 0, 0, 127 ); 
                imagefill( $virtual_image, 0, 0, $transparent ); 
                
                /* copy source image at a resized size */
                imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);

                imagealphablending($virtual_image, false); 

                imagesavealpha($virtual_image,true); 
                /* create the physical thumbnail image to its destination */
                imagepng($virtual_image, $dest);

                return true;
	}
}