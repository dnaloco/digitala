<?php
namespace Tweet;

use Zend\Mvc\MvcEvent;

class Module
{
	public function onBootstrap(MvcEvent $event)
	{
		$eventManager = $event->getApplication()->getEventManager();

		/*$eventManager->attach('sendTweet', function($e) {
			var_dump($e);
		}, 100);*/

		/*$sharedEventManager = $eventManager->getSharedManager();

		$sharedEventManager->attach('Tweet\Service\TweetService', 'sendTweet', function ($e) {
			echo '<br/>';
			var_dump($e);die;
		}, 100);*/
        //$eventManager->attach(new Listener\SendListener());

        /*$eventManager->attach('do', function($e) {
            $event  = $e->getName();
            $params = $e->getParams();

            printf(
                'Handled event "%s" with parameter "%s"',
                $event,
                json_encode($params)
            );
        });

        $params = array('foo' => 'bar','baz' => 'bat');
        $eventManager->trigger('do', null, $params);*/

        /*$eventManager->getSharedManager()
          ->attach('Zend\Mvc\Controller\AbstractActionController',
                    'dispatch',
         function($e) {
              $controller = $e->getTarget();

             //check if logged in, setting up the userid variable of controllers
            if ($e->getApplication()->getServiceManager()->get('AuthService')
                                            ->hasIdentity()) {
                   $users = $e->getApplication()->getServiceManager()
                            ->get('SanAuth\Model\AuthStorage')->read();

                   $controller->userid = $users['id'];
             }
        }, 100);*/
	}

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__=> __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
