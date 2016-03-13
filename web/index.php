<?php

require_once __DIR__.'/../bootstrap.php';

$app->get( '/', function() use ($app) {
    return $app['twig']->render('layout.html.twig', array('backlog'=>false, 'timeline'=>false, 'codigoArea' => true));
});

$app['url'] = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'];

$app->mount('/backlog', new Backlog\Routes());
$app->mount('/timeline', new Timeline\Routes());

/**
 * API
 */
$app->mount('/projetos', new Projeto\Routes());
$app->mount('/areas', new Area\Routes());
$app->mount('/email_areas', new EmailArea\Routes());

$app->run();