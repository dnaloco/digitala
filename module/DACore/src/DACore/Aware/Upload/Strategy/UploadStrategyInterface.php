<?php
namespace DACore\Aware\Upload\Strategy;

interface UploadStrategyInterface
{
	public function move($src, $dest, $desired_width);
}