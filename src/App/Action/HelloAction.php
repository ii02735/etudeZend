<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Query;
use App\Entity\Personne;

class HelloAction implements MiddlewareInterface {
    
    private $entityManager;
    
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        return new JsonResponse($this->entityManager->getRepository(Personne::class)->createQueryBuilder("test")->getQuery()->getResult(Query::HYDRATE_ARRAY));
    }

}