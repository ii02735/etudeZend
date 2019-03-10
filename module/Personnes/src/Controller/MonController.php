<?php
namespace Personnes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

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
    
    public function vueAction()
    {
        $view = new ViewModel();
        return $view->setTemplate("view/Vue");
    }
}

