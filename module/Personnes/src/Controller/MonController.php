<?php
namespace Personnes\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;

class MonController extends AbstractActionController
{
    private $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
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

