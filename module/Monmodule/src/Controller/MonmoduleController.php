<?php
/**
 * @link      http://github.com/zendframework/Monmodule for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Monmodule\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Doctrine\ORM\EntityManager;
use Monmodule\Entity\Commentaire;
use Zend\View\Model\JsonModel;

class MonmoduleController extends AbstractActionController
{
    private $entityManager;
    
    public function __construct(EntityManager $em){
        $this->entityManager = $em;
    }
    
    public function indexAction()
    {
        $commentaires = $this->entityManager->getRepository(Commentaire::class);
        $vue = new ViewModel(["comment" => $commentaires->findAll()]);
        $vue->setTemplate("Monmodule");
        return $vue->setTerminal(true);
    }
    
    public function addcommentAction()
    {
        if(!ctype_space($this->getRequest()->getPost("texte")) || !is_null($this->getRequest()->getPost("texte")))
        {
            $commentaire = new Commentaire();
            $commentaire->setTexte($this->getRequest()->getPost("texte"));
            $commentaire->setDate(new \DateTime("now"));
            $this->entityManager->persist($commentaire);
            $this->entityManager->flush();
        }
        if(!$this->getRequest()->isXmlHttpRequest())
            $this->redirect()->toRoute("monmodule");
        
    }
    
    public function addlikeAction()
    {
        $currentComment = $this->entityManager->getRepository(Commentaire::class)->find($this->getRequest()->getPost("data"));
        $currentComment->setAime($currentComment->getAime()+1);
        $this->entityManager->flush();
        return new JsonModel(["id"=>$currentComment->getId(),"like"=>$currentComment->getAime()]);
    }
}
