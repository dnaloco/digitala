<?php
namespace DACore\Upload;

interface MyUploadAwareInterface
{
	public function setUploadManager(MyAbstractUpload $uploadManager);
	public function getUploadManager();
}