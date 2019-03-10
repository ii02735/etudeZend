<?php
namespace Personnes\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class MonController extends AbstractActionController
{
    public function indexAction()
    {
        $this->response->setContent("Hello world");
        return $this->response;
    }
    
    public function secondeAction()
    {
        $numero = $this->params()->fromRoute("numero",0);
        $this->response->setContent("Vous êtes à la page " . $numero);
        return $this->response;
    }
}

