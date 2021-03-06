<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 29/02/16
 * Time: 22:36
 */

namespace Backlog\Controller;

use Backlog\Service\BacklogServices;
use Projeto\Services\ProjetoService;
use Silex\Application;

class IndexController
{
    public function indexAction(Application $app)
    {
        return $app['twig']->render('backlog/backlog.html.twig', array(
            'backlog'=>true,
            'timeline'=>false,
            'codigoArea' => true,
            'projeto' => array('id' => 0, 'nome' => '', 'dataInicio' => '', 'dataFim' => ''),
            'tarefa' => ''
        ));
    }

    public function projetoAction(Application $app)
    {
        $request = $app['request'];
        $idProjeto = $request->get('id');

        $backlogService = new BacklogServices($app['entity_manager']);
        $arrayBackLogs = $backlogService->getBacklogByProjectId($idProjeto);

        $projetoService = new ProjetoService($app['entity_manager']);
        $arrayProjeto = $projetoService->readById($idProjeto);
        $arrayProjeto['dataFim']    = new \DateTime($arrayProjeto['dataFim']);
        $arrayProjeto['dataInicio'] = new \DateTime($arrayProjeto['dataInicio']);

        $arrayProjeto['dataFim']    = $arrayProjeto['dataFim']->format('d/m/Y');
        $arrayProjeto['dataInicio'] = $arrayProjeto['dataInicio']->format('d/m/Y');

        return $app['twig']->render('backlog/backlog.html.twig', array(
            'backlog'=>true,
            'timeline'=>false,
            'codigoArea' => true,
            'projeto' => $arrayProjeto,
            'tarefa' => json_encode($arrayBackLogs)));
    }
}