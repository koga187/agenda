<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 16:15
 */

namespace EmailArea\Controller;


use Area\Services\AreaService;
use Common\Controller\ApiControllerAbstract;
use Common\Controller\ApiControllerInterface;
use Common\Entity\Email;
use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;
use EmailArea\Services\EmailAreaServices;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EmailAreaController extends ApiControllerAbstract implements ApiControllerInterface
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


        return $this->response->create($content, $status);
    }

    /**
     * @param Application $app
     * @return Response
     */
    public function readAction(Application $app)
    {
        return $this->response;
    }

    public function readByIdAction(Application $app)
    {

    }

    /**
     * @param Application $app
     * @return Response
     */
    public function updateAction(Application $app)
    {
        return $this->response;
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