<?php
namespace DACore\Aware\Upload;

interface MyUploadAwareInterface
{
	public function setUploadManager(MyAbstractUpload $uploadManager);
	public function getUploadManager();
}