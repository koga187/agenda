<?php

require_once __DIR__.'/../bootstrap.php';

$response = new \Symfony\Component\HttpFoundation\Response();

$app->get( '/', function() use ($app) {
    return $app['twig']->render('layout.html.twig');
});

//$app->get('/view', function() use ( $app ) {
//    $image_glob = glob($app['upload_folder'] . '/img*');
//
//    $images = array_map(
//        function($val) { return basename( $val ); },
//        $image_glob
//    );
//
//    return $app['twig']->render('gallery.html.twig',array(
//        'images' => $images,
//    ));
//});

$app->get("/kanban", function() use ($response, $app){
    return $app['twig']->render('kanban/kanban.html.twig');
});

$app->get('/dashboard', function () use ($app) {
    return 'dashboard ';
});

$app->run();