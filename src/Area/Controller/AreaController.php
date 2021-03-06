<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 16:02
 */

namespace Area\Controller;


use Area\Services\AreaService;
use Common\Controller\ApiControllerAbstract;
use Common\Controller\ApiControllerInterface;
use Common\Services\EntityHydrator;
use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AreaController extends ApiControllerAbstract implements ApiControllerInterface
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

        $this->response->setContent($content);
        $this->response->setStatusCode($status);

        return $this->response;
    }

    /**
     * @param Application $app
     * @return array
     */
    public function readAction(Application $app)
    {
        $serviceArea = new AreaService($app['entity_manager']);
        $objectArea = $serviceArea->read('Common\Entity\Area');

        if(count($objectArea) > 0) {
            $dados =  EntityHydrator::toArray($objectArea);
            $dados['total'] =  count($dados['rows']);

            $status = Response::HTTP_OK;
            $content = json_encode($dados);
        } else {
            $content = json_encode([]);
            $status = Response::HTTP_NO_CONTENT;
        }

        $this->response->setContent($content);
        $this->response->setStatusCode($status);

        return $this->response;
    }

    public function readByIdAction(Application $app)
    {
        $request = $app['request'];
        $areaId = $request->get('id');

        $areaService = new AreaService($app['entity_manager']);

        $arrayAreas = [];

        $array = $areaService->getAreaAndEmailsByAreaId($areaId);

        if(count($array) > 0) {
            foreach($array  as $key => $emailArea) {
                $arrayAreas[$emailArea['id']]['nome'] = $emailArea['nome'];
                $arrayAreas[$emailArea['id']]['id'] = $emailArea['id'];
                $arrayAreas[$emailArea['id']]['descricao'] = $emailArea['descricao'];

                if(!empty($emailArea['idEmail'])) {
                    $arrayAreas[$emailArea['id']]['email'][] = [
                        'id'    => $emailArea['idEmail'],
                        'nome'  => $emailArea['nomeEmail'],
                        'email' => $emailArea['email']
                    ];
                }
            }
        }

        $this->response->setContent(json_encode($arrayAreas))
            ->setStatusCode(Response::HTTP_OK);

        return $this->response;
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
     * @param Application $app
     * @return Response
     */
    public function deleteAction(Application $app)
    {
        $request = $app['request'];
        $id = $request->get('id');

        $areaServices = new AreaService($app['entity_manager']);
        $entity = $areaServices->logicDelete('Common\Entity\Area', ['id' => $id]);

        $dehydratedEntity = EntityHydrator::dehydrated($entity);

        $this->response->setContent(json_encode($dehydratedEntity));
        $this->response->setStatusCode(Response::HTTP_OK);

        return $this->response;
    }
}