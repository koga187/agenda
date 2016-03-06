<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 16:15
 */

namespace EmailArea\Controller;


use Area\Services\AreaService;
use Common\Entity\Email;
use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;
use EmailArea\Services\EmailAreaServices;
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
            'email' => $request->get('email'),
            'idArea' => $request->get('idArea')
        ];

        $emailAreaService = new EmailAreaServices($app['entity_manager']);

        if ($emailAreaEntity = $emailAreaService->create(new Email(), $dados)) {
            $dados = EntityHydrator::dehydrated($emailAreaEntity);
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