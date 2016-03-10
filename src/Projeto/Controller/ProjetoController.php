<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 10:04
 */

namespace Projeto\Controller;


use Backlog\Service\BacklogServices;
use Common\Controller\ApiControllerAbstract;
use Common\Controller\ApiControllerInterface;
use Common\Entity\Projetos;
use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;
use Projeto\Services\ProjetoService;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjetoController extends ApiControllerAbstract implements ApiControllerInterface
{
    /**
     * @param Application $app
     * @return mixed
     */
    public function createAction(Application $app)
    {
        $request = $app['request'];
        $dados = [
            'nome' => $request->get('tituloProjeto'),
            'descricao' => $request->get('descricaoProjeto'),
            'areaId' => $request->get('selectArea'),
            'dataInicio' => new \DateTime($request->get('dataInicio')),
            'dataFim' => new \DateTime($request->get('dataFim')),
            'dataIn'  => new \DateTime('now')
        ];

        $projetoService = new ProjetoService($app['entity_manager']);

        if ($projetosEntity = $projetoService->create(new Projetos(), $dados)) {
            $dados = EntityHydrator::dehydrated($projetosEntity);
            $content = json_encode($dados);
            $status  = Response::HTTP_CREATED;
        } else {
            $content = json_encode([]);
            $status  = Response::HTTP_NOT_MODIFIED;
        }

        $this->response->setContent($content);
        $this->response->setStatusCode($status);

        return $this->response;
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function readAction(Application $app)
    {
        $serviceProjeto = new ProjetoService($app['entity_manager']);
        $arrayProjeto = $serviceProjeto->read('Common\Entity\Projetos');

        if(count($arrayProjeto) > 0) {
            $dados =  EntityHydrator::toArray($arrayProjeto);
            $dados['total'] = count($dados['rows']);
            $status = Response::HTTP_OK;
            $content = json_encode($dados);
        } else {
            $dados['rows'] = [];
            $content = json_encode([]);
            $status = Response::HTTP_NO_CONTENT;
        }

        $this->response->setContent($content);
        $this->response->setStatusCode($status);

        return $this->response;
    }

    /**
     * @param Application $app
     */
    public function readByIdAction(Application $app)
    {
        $request = $app['request'];

        $projetoService = new ProjetoService($app['entity_manager']);
        $array = $projetoService->readById($request->get('id'));


        $dados = [];
        $status = Response::HTTP_NO_CONTENT;

        /**
         * @var Projetos $array[]
         */
        if(count($array) > 0) {
            $dados['id'] = $array[0]->getId();
            $dados['nome'] = $array[0]->getNome();
            $dados['descricao'] = $array[0]->getDescricao();
            $dados['idArea'] = $array[0]->getAreaId()->getId();
            $dados['dataInicio'] = $array[0]->getDataInicio()->format('d/m/Y');
            $dados['dataFim'] = $array[0]->getDataFim()->format('d/m/Y');
            $status = Response::HTTP_OK;
        }

        $this->response->setContent(json_encode($dados))
            ->setStatusCode($status);

        return $this->response;
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function getBacklogsAction(Application $app)
    {
        $request = $app['request'];
        $projetoId = $request->get('id');

        $backlogService = new BacklogServices($app['entity_manager']);
        $backlogService->getBacklogByProjetcId($projetoId);

        $content = [];
        $status = Response::HTTP_NO_CONTENT;

        if(count($backlogService) > 0) {
            $content = $backlogService;
            $status = Response::HTTP_OK;
        }

        $this->response->setContent(json_encode($content))
            ->setStatusCode($status);

        return $this->response;

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