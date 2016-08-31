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

    public function test()
    {
        return 'OK estou funcionando :)';
    }

    public function clearPath ($path)
    {
        $files = glob($path . '/*');

        foreach($files as $file){
          if(is_file($file))
            unlink($file);
        }

        return true;
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