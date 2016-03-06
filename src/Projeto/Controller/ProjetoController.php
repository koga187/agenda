<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 10:04
 */

namespace Projeto\Controller;


use Common\Controller\ApiControllerInterface;
use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;
use Projeto\Services\ProjetoService;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProjetoController implements ApiControllerInterface
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
            'dataInicio' => new \DateTime($request->get('dataInicio')),
            'dataFim' => new \DateTime($request->get('dataFim')),
            'dataIn'  => new \DateTime('now')
        ];

        $projetoService = new ProjetoService($app['entity_manager']);

        if ($projetosEntity = $projetoService->create('Common\Entity\Projetos', $dados)) {
            $dados = EntityHydrator::dehydrated($projetosEntity);
            $content = json_encode($dados);
            $status  = Response::HTTP_CREATED;
        } else {
            $content = json_encode([]);
            $status  = Response::HTTP_NOT_MODIFIED;
        }


        return new Response($content, $status);
    }

    /**
     * @param Request $request
     * @param EntityManager $em
     * @param Response $response
     * @return mixed
     */
    public function readAction(Request $request, EntityManager $em, Response $response)
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