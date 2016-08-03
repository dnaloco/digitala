<?php
namespace DAUser\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class AuthRestController extends AbstractRestfulController
{
	// verificar se existe alguem logado no sistema
	public function getList()
	{

	}

	// verificar se usuário específico está logado
	public function get($user)
	{

	}

	// logar usuário
	public function create($data)
	{

	}

	// modificar algum registro do login como senha ou roles...
	public function update($id, $data)
	{

	}

	public function delete($id)
	{

	}
}