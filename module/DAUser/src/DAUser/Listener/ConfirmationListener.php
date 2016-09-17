<?php
namespace DAUser\Listener;

use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;

class ConfirmationListener implements ListenerAggregateInterface
{
	protected $listeners = array();

	public function __construct($mailService)
	{
		$this->mailService = $mailService;
	}

	public function attach(EventManagerInterface $events)
	{
		$sharedEvents = $events->getSharedManager();
		$this->listeners[] = $sharedEvents->attach('DAUser\Controller\UserRestController', 'onCreateUser', array($this, 'onEmailConfirmation'), 100);
	}

	public function detach(EventManagerInterface $events)
	{
		foreach($this->listeners as $index => $listener) {
			if ($events->detach($listener)) {
				unset($this->listeners[$index]);
			}
		}
	}

	public function onEmailConfirmation($e)
	{
		$data = $e->getParams();

		$dataEmail = [
			'name' => $data['person']['name'],
			'activationKey' => $data['activationKey']
		];

		$this->mailService->setPage('activate-user')
			->setSubject('Confirmação de Cadastro')
            ->setTo($data['user'])
            ->setData($dataEmail)
            ->prepare()
            ->send();
	}
}