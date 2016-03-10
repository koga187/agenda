<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 07/03/2016
 * Time: 18:17
 */

namespace Common\Controller;


use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiControllerAbstract
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
    }
}