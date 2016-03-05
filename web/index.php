<?php

require_once __DIR__.'/../bootstrap.php';

//$response->headers->set('Content-Type', 'json;charset=UTF-8');

$app->get( '/', function() use ($app) {
    return $app['twig']->render('layout.html.twig', array('backlog'=>false, 'timeline'=>false));
});

$app->mount('/backlog', new Backlog\Routes());
$app->mount('/timeline', new Timeline\Routes());
$app->mount('/projetos', new Projeto\Routes());
$app->mount('/areas', new Area\Routes());
$app->mount('/email_areas', new EmailArea\Routes());

$app->run();