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
use Common\Entity\StatusTarefa;
use Common\Entity\Tarefas;
use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;
use Silex\Application;
use StatusTarefa\Service\StatusTarefaServices;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BacklogController extends ApiControllerAbstract implements ApiControllerInterface
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
            'descricao' => $request->get('descricao'),
            'nome' => $request->get('nome'),
            'dataIn' => new \DateTime('now')
        );

        $backlogService = new BacklogServices($app['entity_manager']);
        $entityBacklog = $backlogService->create($data);

        $status = Response::HTTP_NO_CONTENT;

        if($entityBacklog instanceof Tarefas) {

            $statusService = new StatusTarefaServices($app['entity_manager']);
            $statusService->create(new StatusTarefa(), array(
                'statusId' => 1,
                'tarefaId' => $entityBacklog->getId(),
                'dataIn'   => new \DateTime('now')
            ));

            $content = array(
                'id' => $entityBacklog->getId(),
                'nome' => $entityBacklog->getNome(),
                'descricao' => $entityBacklog->getDescricao(),
                'hora' => $entityBacklog->getHora()
            );
            $this->response->setContent(json_encode($content));
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
        $request = $app['request'];
        $idBacklog = $request->get('id');

        $backLogService = new BacklogServices($app['entity_manager']);
        $content = $backLogService->readById($idBacklog);

        $this->response->setContent(json_encode($content))
            ->setStatusCode(Response::HTTP_OK);

        return $this->response;
    }

    /**
     * @param Application $app
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Application $app)
    {
        $request = $app['request'];

        $dados = [
            'id'         => $request->get('id'),
            'nome'       => $request->get('nome'),
            'descricao'  => $request->get('descricao'),
            'dataInicio' => new \DateTime($request->get('dataInicio')),
            'dataFim'    => new \DateTime($request->get('dataFim')),
            'projetoId'  => $request->get('projetoId')
        ];

        $backlogService = new BacklogServices($app['entity_manager']);
        $backlogReference = $backlogService->update($dados);

        $status = Response::HTTP_NOT_MODIFIED;

        if($backlogReference instanceof Tarefas) {
            $status = Response::HTTP_OK;
        }

        $this->response->setStatusCode($status);

        return $this->response;
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function deleteAction(Application $app)
    {
        $request = $app['request'];

        $id = $request->get('id');

        $backlogServices = new BacklogServices($app['entity_manager']);
        $entity = $backlogServices->logicDelete('Common\Entity\Tarefas', ['id' => $id]);

        $content = EntityHydrator::dehydrated($entity);

        $this->response->setContent(json_encode($content));
        $this->response->setStatusCode(Response::HTTP_OK);

        return $this->response;
    }
}