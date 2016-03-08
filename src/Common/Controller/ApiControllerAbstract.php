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

class ApiControllerAbstract implements ApiControllerInterface
{
    protected $response;

    public function __construct()
    {
        $this->response = new Response();
        $this->response->headers->set('Content-Type', 'application/json', true);
    }
    /**
     * @param Application $app
     * @return mixed
     */
    public function createAction(Application $app)
    {

    }

    /**
     * @param Application $app
     * @return mixed
     */
    public function readAction(Application $app)
    {

    }

    /**
     * @param Request $request
     * @param EntityManager $em
     * @param Response $response
     * @return mixed
     */
    public function updateAction(Request $request, EntityManager $em, Response $response)
    {

    }

    /**
     * @param Request $request
     * @param EntityManager $em
     * @param Response $response
     * @return mixed
     */
    public function deleteAction(Request $request, EntityManager $em, Response $response)
    {

    }
}