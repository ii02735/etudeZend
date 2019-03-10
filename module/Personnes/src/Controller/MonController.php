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
}

