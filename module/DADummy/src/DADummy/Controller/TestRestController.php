<?php
namespace DADummy\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;

class TestRestController extends AbstractRestfulController
{
    use \DACore\Strategy\SerializerStrategies;

    // verificar se existe alguem logado no sistema
    public function getList()
    {
        $request = $this->request;

        $headers = $request->getHeaders();
        $header = json_decode($this->getPropertyNamingSerializer()->serialize($request->getHeaders(), 'json'), true);

        return new JsonModel(array('success' => false, 'headers' => $headers));
    }

    // verificar se usuário específico está logado
    public function get($user)
    {
        return new JsonModel(array('success' => false));
    }

    // logar usuário
    public function create($data)
    {
        return new JsonModel(array('success' => false));
    }

    // modificar algum registro do login como senha ou roles...
    public function update($id, $data)
    {
        return new JsonModel(array('success' => false));
    }

    public function delete($id)
    {
        return new JsonModel(array('success' => false));
    }

    public function options()
    {
        $request = $this->request;

        $headers = $request->getHeaders();
        $header = json_decode($this->getPropertyNamingSerializer()->serialize($request->getHeaders(), 'json'), true);

        return new JsonModel(array('success' => false, 'id_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3NhbXBsZXMuYXV0aDAuY29tLyIsInN1YiI6ImZhY2Vib29rfDEwMTU0Mjg3MDI3NTEwMzAyIiwiYXVkIjoiQlVJSlNXOXg2MHNJSEJ3OEtkOUVtQ2JqOGVESUZ4REMiLCJleHAiOjE0MTIyMzQ3MzAsImlhdCI6MTQxMjE5ODczMH0.7M5sAV50fF1-_h9qVbdSgqAnXVF7mz3I6RjS6JiH0H8', 'headers' => $headers));
    }
}
