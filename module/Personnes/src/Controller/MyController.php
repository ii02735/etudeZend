<?php
/**
 * Created by IntelliJ IDEA.
 * User: yadallee
 * Date: 09/03/19
 * Time: 01:32
 */

namespace Personnes\Controller;


use Zend\Http\Response;
use Zend\Mvc\Controller\AbstractActionController;


class MyController extends AbstractActionController
{
    public function indexAction()
    {
        return Response::fromString("hello"); // TODO: Change the autogenerated stub
    }
}