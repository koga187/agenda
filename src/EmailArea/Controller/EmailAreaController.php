<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 16:15
 */

namespace EmailArea\Controller;


use Area\Services\AreaService;
use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailAreaController
{

    /**
     * @param Application $app
     * @return Response
     */
    public function createAction(Application $app)
    {
        $request = $app['request'];

        $dados = [
            'nome' => $request->get('nomeEmail'),
            'email' => $request->get('email')
        ];

        $areaService = new AreaService($app['entity_manager']);

        if ($areaEntity = $areaService->create('Common\Entity\Area', $dados)) {
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
    public function readAction(Request $request, EntityManager $em, Responsee $response)
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