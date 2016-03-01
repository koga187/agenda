<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/doctrine_config.php';

$app = new Silex\Application();
$app['debug'] = true;
$app['entity_manager'] = $em;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));