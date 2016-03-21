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
use Common\Entity\StatusTarefa;
use Doctrine\ORM\EntityManager;
use Silex\Application;
use StatusTarefa\Service\StatusTarefaServices;
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
        $request = $app['request'];

        $dados = [
            'tarefaId' => $request->get('id'),
            'statusId' => $request->get('idStatus'),
            'dataIn'   => new \DateTime('now')
        ];

        $statusTarefaService = new StatusTarefaServices($app['entity_manager']);


        $statusTarefaService->updateOldStatus($dados['tarefaId']);

        $entity = $statusTarefaService->create(new StatusTarefa(), $dados);

        $content = json_encode([]);

        $status = Response::HTTP_NO_CONTENT;

        if($entity instanceof StatusTarefa) {
            $content = json_encode([
                'statusTarefaId' => $entity->getId(),
                'statusId'   => $entity->getStatusId(),
                'tarefaId'   => $entity->getTarefaId(),
            ]);

            $status = Response::HTTP_OK;
        }

        $this->response->setContent($content)
            ->setStatusCode($status);

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