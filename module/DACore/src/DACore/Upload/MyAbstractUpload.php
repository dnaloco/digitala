<?php 
namespace DACore\Upload;

use Zend\File\Transfer\Adapter\Http;

abstract class MyAbstractUpload
{
	const IMAGE_EXTENSIONS = array('jpg', 'jpeg', 'png', 'gif', 'rtf');
	const MIN_SIZE = 10 * 1024;
    const MAX_SIZE = 1024 * 1024;

    protected $tmp_path;

    public function __construct()
    {
        $this->tmp_path = './tmp/';
    }


    public static function clearPath ($path)
    {
        $files = glob($path . '/*');

        foreach($files as $file){
          if(is_file($file))
            unlink($file);
        }

        return true;
    }

    protected static function getFileDestination($baseDestination, $title, $ext, $prefix = null)
    {
        return $baseDestination . $title . $prefix . '.' . $ext;
    }

    public function getPhoto($key, $photo, $imageData)
    {
        $key = $key . '_photo';
        $imagesize = getimagesize($this->tmp_path . $photo);
        self::clearPath($imageData['path']);
        $ext = pathinfo($photo, PATHINFO_EXTENSION);
        $uniqueId = uniqid();
        $imageData['name'] = $uniqueId . $imageData['name'];

        $destinations = [
            'thumb' => [
                'dest' => self::getFileDestination($imageData['path'], $imageData['name'], $ext, '_thumb'),
                'desired_width' => 200
            ],
            'small' => [
                'dest' => self::getFileDestination($imageData['path'], $imageData['name'], $ext, '_small'),
                'desired_width' => 360
            ],
            'medium' => [
                'dest' => self::getFileDestination($imageData['path'], $imageData['name'], $ext, '_medium'),
                'desired_width' => 800
            ],
            'large' => [
                'dest' => self::getFileDestination($imageData['path'], $imageData['name'], $ext, '_large'),
                'desired_width' => 1080
            ],
            'xlarge' => [
                'dest' => self::getFileDestination($imageData['path'], $imageData['name'], $ext, '_xlarge'),
                'desired_width' => 1440
            ],
            'original' => [
                'dest' => self::getFileDestination($imageData['path'], $imageData['name'], $ext),
            ]
        ];

        $uploadsResult = $this->moveUploaded($photo, $destinations);


        foreach($uploadsResult as $result) {

            if($result['desired_width'] == 'thumb' && $result['result'])  {
                $imageData['hasThumb'] = true;
            } else if($result['desired_width'] == 'small' && $result['result'])  {
                $imageData['hasSmall'] = true;
            } else if($result['desired_width'] == 'medium' && $result['result'])  {
                $imageData['hasMedium'] = true;
            } else if($result['desired_width'] == 'large' && $result['result'])  {
                $imageData['hasLarge'] = true;
            } else if($result['desired_width'] == 'xlarge' && $result['result'])  {
                $imageData['hasXLarge'] = true;
            }
        }

        $imageData['alt'] = 'Foto do proprietário da conta';
        $imageData['width'] = $imagesize[0];
        $imageData['height'] = $imagesize[1];
        $imageData['filetype'] = $ext;

        return new \DABase\Entity\Image($imageData);
    }

    public function moveUploaded($tmp_file, array $destinations)
    {
        $ext = pathinfo($tmp_file, PATHINFO_EXTENSION);

        $uploadStrategy = null;

        $src = $this->tmp_path . $tmp_file;

        switch($ext) {
            case 'jpg' || 'jpeg':
                $uploadStrategy = new Strategy\JpgImageStrategy();
                break;
            case 'png';
                $uploadStrategy = new Strategy\PngImageStrategy();
                break;
        }

        $uploadsResult = [];

        foreach ($destinations as $key => $destination) {
            $dest = $destination['dest'];
            if (isset($destination['desired_width'])) {
                $desired_width = $destination['desired_width'];
                $result = $uploadStrategy->move($src, $dest, $desired_width);
            } else {
                $result = $uploadStrategy->original($src, $dest);
            }
            array_push($uploadsResult, array('desired_width' => $key, 'result' => $result) );
        }

        return $uploadsResult;
    }

    public function preuploadFiles($type)
    {
    	$response = array('errors' => array(), 'success' => false, 'data' => array());

    	$validators = array();

        $adapter = new \Zend\File\Transfer\Adapter\Http();
        $adapter->setDestination($this->tmp_path);

        switch($type){
        	case 'image':
                array_push($validators, new \Zend\Validator\File\FilesSize(array(
                    'min' => self::MIN_SIZE, 'max' => self::MAX_SIZE)));
                array_push($validators, new \Zend\Validator\File\Extension(array(
                    'extension' => self::IMAGE_EXTENSIONS)));

        		break;
        }

        foreach($validators as $validator) {
            $adapter->addValidator($validator);
        }

		$files = $adapter->getFileInfo();

		foreach($files as $file) {
			if (!$response['success'] = $adapter->isValid()) {
				$response['errors'][] = $adapter->getMessages();
			}
			if (!$response['success'] = $adapter->isUploaded($file)) {
				$response['errors'][] = array('Not uploaded');
			}
			$response['success'] = $adapter->receive();
			$response['data'] = $file['name'];
		}

    	return $response;
    }
}