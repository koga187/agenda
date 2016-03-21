<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 21/03/16
 * Time: 08:58
 */

namespace StatusTarefa\Controller;


use Common\Controller\ApiControllerAbstract;
use Common\Controller\ApiControllerInterface;
use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class StatusTarefaController extends ApiControllerAbstract implements ApiControllerInterface
{

    /**
     * @param Application $app
     * @return Response
     */
    public function createAction(Application $app)
    {

        return $this->response;
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function readAction(Application $app)
    {
        return $this->response;
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function readByIdAction(Application $app)
    {
        return $this->response;
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Application $app)
    {
        return $this->response;
    }

    /**
     * @param Request $request
     * @param EntityManager $em
     * @param Response $response
     * @return Response
     */
    public function deleteAction(Request $request, EntityManager $em, Response $response)
    {
        return $this->response;
    }
}