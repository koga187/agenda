<?php

require_once __DIR__.'/../bootstrap.php';

use \Symfony\Component\HttpFoundation\Request;
$response = new \Symfony\Component\HttpFoundation\Response();
$response->headers->set('Content-Type', 'json;charset=UTF-8');

$app->get( '/', function() use ($app) {
    return $app['twig']->render('layout.html.twig', array('backlog'=>false, 'timeline'=>false));
});

$app->mount("/backlog", new Backlog\Controller\IndexController());

$app->get('/timeline', function () use ($app) {
    return $app['twig']->render('timeline/timeline.html.twig', array('timeline'=>true, 'backlog'=>false));
});

$app->post('/projetos/', function (Request $request) use ($response, $app, $em) {
    $dados = [
        'nome' => $request->get('tituloProjeto'),
        'descricao' => $request->get('descricaoProjeto'),
        'dataInicio' => new DateTime($request->get('dataInicio')),
        'dataFim' => new DateTime($request->get('dataFim')),
        'dataIn'  => new DateTime('now')
    ];

    $projetoService = new \Common\Service\ProjetosService($em);
    if ($projetosEntity = $projetoService->create('Common\Entity\Projetos', $dados)) {
        $response->setContent(json_encode($dados))
            ->setStatusCode('200');
    }

    return $response;
});

$app->get('/projetos/', function () use ($response, $app, $em) {

    $projetoService = new \Common\Service\ProjetosService($em);
    if ($listaProjetos = $projetoService->read('Common\Entity\Projetos')) {

        $response->setContent(json_encode($listaProjetos))
            ->setStatusCode('200');
    }

    return $response;
});

$app->run();