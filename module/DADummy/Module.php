<?php
namespace DADummy;

use Zend\ModuleManager\ModuleManager;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\View\Model\JsonModel;
use Zend\EventManager\SharedEventManager;

class Module {
	/*public function init(ModuleManager $mm) {

		$mm->getEventManager()->getSharedManager()->attach(__NAMESPACE__,
			'dispatch', function ($e) {
				$layoutType = getenv("APPLICATION_ENV") ?? '';
				$e->getTarget()->layout('layout/blog01' . $layoutType);
			});
	}*/
	
	public function onBootstrap(MvcEvent $e) {

		$sm = $e->getApplication()->getServiceManager();

		$em = $e->getApplication()->getEventManager();

		$sem = $em->getSharedManager();

		$moduleRouteListener = new ModuleRouteListener();

		$moduleRouteListener->attach($em);

/*		$baz = new Baz;
		$barListeners = new Bar;
		$baz->getEventManager()->attachAggregate($barListeners);
		$baz->get(1);

		$em->attach('route', function($e) {
            echo '<br>', 'executed on route process', '<br>'; 
        });
 
        $em->attach('dispatch', function($e) {
            echo 'executed on dispatch process', '<br>'; 
        });
 
        $em->attach('dispatch.error', function($e) {
            echo $e->getParam('exception');
            echo '<br />executed only if found an error <br />,
            for ex : sm not found <br />'; 
        });
 
        $em->attach('render', function($e) {
            $e->getViewModel()->setVariable('test', 'test');
            echo 'executed on render process <br />';
        });
 
		$em->attach('render.error', function($e) {
			echo 'executed on render  error found', '<br>'; 
		});

		$em->attach('finish', function($e) {
			echo 'executed on finish process', '<br>'; 
		});
*/
		/*$sharedEvent = new SharedEventManager;
		$sharedEvent->attach('Foo', 'bar', function ($e) {
			$event 	= $e->getName();
			$target = get_class($e->getTarget());
			$params = json_encode($e->getParams());

			printf(
				'%s called on %s, using params %s',
				$event,
				$target,
				$params
			);

			echo "HELLO";
		});

		$foo = new Foo();
		$foo->getEventManager()->setSharedManager($sharedEvent);
		$foo->bar('bazvalue', 'batvalue');*/



		/*$em->attach(new Listener\SendListener());*/

/*		$sem->attach('DADummy\Service\TweetService', 'sendTweet', function ($e) {
			var_dump($e);
		}, 100);

		$em->attach(MvcEvent::EVENT_ROUTE, function($e) {
            echo "Mvc Event Route(MvcEvent::EVENT_ROUTE)!!!";
        }, 100);

		$sem->attach('DADummy\Service\ServiceInterface', 'sendTweet', function ($e) {
			var_dump($e);
		}, 100);*/

		//$em->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onDispatchError'), 0);
        //$em->attach(MvcEvent::EVENT_RENDER_ERROR, array($this, 'onRenderError'), 0);
	}

	public function onDispatchError($e)
    {
        return $this->getJsonModelError($e);
    }

    public function onRenderError($e)
    {
        return $this->getJsonModelError($e);
    }

    public function getJsonModelError($e)
    {
        $error = $e->getError();
        if (!$error) {
            return;
        }

        $response = $e->getResponse();
        $exception = $e->getParam('exception');
        $exceptionJson = array();
        if ($exception) {
            $exceptionJson = array(
                'class' => get_class($exception),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'message' => $exception->getMessage(),
                'stacktrace' => $exception->getTraceAsString()
            );
        }

        $errorJson = array(
            'message'   => 'An error occurred during execution; please try again later.',
            'error'     => $error,
            'exception' => $exceptionJson,
        );
        if ($error == 'error-router-no-match') {
            $errorJson['message'] = 'Resource not found.';
        }

        $model = new JsonModel(array('errors' => array($errorJson)));

        $e->setResult($model);

        return $model;
    }

	public function getConfig() {
		return include __DIR__ . '/config/module.config.php';
	}

	public function getAutoloaderConfig() {
		return array(
			'Zend\Loader\StandardAutoloader' => array(
				'namespaces' => array(
					__NAMESPACE__=> __DIR__ . '/src/' . __NAMESPACE__,
				),
			),
		);
	}

	public function getServiceConfig()
	{
		return [
			
		];
	}

}