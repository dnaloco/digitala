<?php
namespace DACore\Crud;

class HttpStatusCodeException extends \Exception
{
    // Redefine a exceção de forma que a mensagem não seja opcional
    public function __construct($message, $code = 0, Exception $previous = null) {
        // código
    
        // garante que tudo está corretamente inicializado
        parent::__construct($message, $code, $previous);
    }

    // personaliza a apresentação do objeto como string
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

    public function customFunction() {
        echo "Uma função específica desse tipo de exceção\n";
    }
}