<?php
namespace DASite\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Tweet\Service\TweetService;

use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;



class IndexController extends AbstractActionController
implements \DACore\Aware\ApcCacheAwareInterface
{
    protected $cache;

    public function getCache($cache = null)
    {

        if(!isset($this->cache)) {
            $this->cache = $cache;
        }

        return $this->cache;
    }

    public function indexAction()
    {
        /*$this->cache->setItem('foo', 'bar asda ds asda  dasadsad adadsas ada  asd asdas addsa');
        var_dump($this->cache->getItem('foo'));die;*/
    	// create a log channel
/*		$log = new Logger('MyLogger');
		$log->pushHandler(new StreamHandler('./log/my_app.log', Logger::DEBUG));

		$log->pushHandler(new FirePHPHandler());
		$log->addInfo('My logger is now ready');

		$log->addInfo('Adding a new user', array('username' => 'Seldaek'));*/

        return new ViewModel();
    }

}


/*$optimizer = new \Extlib\ImageOptimizer(array(
    \Extlib\ImageOptimizer::OPTIMIZER_OPTIPNG => '/usr/local/bin/optipng',  //your_path
    \Extlib\ImageOptimizer::OPTIMIZER_JPEGOPTIM => '/usr/local/bin/jpegoptim', //your_path
    \Extlib\ImageOptimizer::OPTIMIZER_GIFSICLE => '/usr/bin/gifsicle' //your_path
));

$optimizer->optimize("./build/teste/espiritualidade-e-natureza.jpg");

die('OK');*/