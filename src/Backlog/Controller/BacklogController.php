<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 13/03/16
 * Time: 18:57
 */

namespace Backlog\Controller;


use Backlog\Service\BacklogServices;
use Common\Controller\ApiControllerAbstract;
use Common\Controller\ApiControllerInterface;
use Common\Entity\Tarefas;
use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class backlogController extends ApiControllerAbstract implements ApiControllerInterface
{
    /**
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Application $app)
    {
        $request = $app['request'];

        $data = array(
            'projetoId' => $request->get('projetoId'),
            'dataFim' => new \DateTime($request->get('dataFim')),
            'dataInicio' => new \DateTime($request->get('dataInicio')),
            'hora' => $request->get('horas'),
            'descricao' => $request->get('descricao'),
            'nome' => $request->get('nome'),
            'dataIn' => new \DateTime('now')
        );

        $backlogService = new BacklogServices($app['entity_manager']);
        $entityBacklog = $backlogService->create($data);

        $status = Response::HTTP_NO_CONTENT;

        if($entityBacklog instanceof Tarefas) {
            $status = Response::HTTP_OK;
        }

        $this->response->setStatusCode($status);

        return $this->response;
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function readAction(Application $app)
    {
        return $this->response;
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\Response
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, EntityManager $em, Response $response)
    {
        return $this->response;
    }
}