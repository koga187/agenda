<?php

require_once __DIR__.'/../bootstrap.php';

use \Symfony\Component\HttpFoundation\Request;
$response = new \Symfony\Component\HttpFoundation\Response();
$response->headers->set('Content-Type', 'json;charset=UTF-8');

$app->get( '/', function() use ($app) {
    return $app['twig']->render('layout.html.twig', array('backlog'=>false, 'timeline'=>false));
});

$app->get("/backlog", function() use ($app){
    return $app['twig']->render('backlog/backlog.html.twig', array('backlog'=>true, 'timeline'=>false));
});

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

    $projeto = new \Common\Service\ProjetosService($em);
    if ($projetosEntity = $projeto->create('Common\Entity\Projetos', $dados)) {
        $response->setContent(json_encode($dados))
            ->setStatusCode('200');
    }

    return $response;
});

$app->run();