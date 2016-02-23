<?php

require_once __DIR__.'/../bootstrap.php';

$response = new \Symfony\Component\HttpFoundation\Response();

$app->get("/", function() use ($response){
    $response->setContent("Ola mundo");
    return $response;
});

$app->get("/kanban", function() use ($response){
    $response->setContent("kanban");
    return $response;
});

$app->get('/storyboard/{name}', function ($name) use ($app) {
    return 'Hello '.$app->escape($name);
});

$app->run();