<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 16:02
 */

namespace Area\Controller;


use Area\Services\AreaService;
use Common\Controller\ApiControllerInterface;
use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AreaController implements ApiControllerInterface
{
    /**
     * @param Application $app
     * @return Response
     */
    public function createAction(Application $app)
    {
        $request = $app['request'];

        $dados = [
            'nome' => $request->get('nomeArea'),
            'descricao' => $request->get('descricaoArea')
        ];

        $areaService = new AreaService($app['entity_manager']);

        if ($areaEntity = $areaService->create('Common\Entity\Area', $dados)) {
            $dados = EntityHydrator::dehydrated($areaEntity);
            $content = json_encode($dados);
            $status  = Response::HTTP_CREATED;
        } else {
            $content = json_encode([]);
            $status  = Response::HTTP_NOT_MODIFIED;
        }


        return new Response($content, $status);
    }

    /**
     * @param Application $app
     * @return array
     */
    public function readAction(Application $app)
    {
        $serviceArea = new AreaService($app['entity_manager']);
        $arrayArea = $serviceArea->read('Common\Entity\Area');

        $dados =  EntityHydrator::toArray($arrayArea);

        return new Response(json_encode($dados), Response::HTTP_FOUND);
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