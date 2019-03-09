<?php
/**
 * Created by IntelliJ IDEA.
 * User: yadallee
 * Date: 09/03/19
 * Time: 19:36
 */

namespace Personnes\Controller;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use Personnes\Model\Entity\Personne;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\JsonModel;

class ApiController extends AbstractActionController
{
    public $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function dataAction()
    {
        $personnes = $this->entityManager->getRepository(Personne::class);
        return new JsonModel($personnes->createQueryBuilder("test")->getQuery()->getResult(Query::HYDRATE_ARRAY));
    }
}