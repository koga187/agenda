<?php

require_once __DIR__.'/vendor/autoload.php';

//use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\EventManager;
//use Doctrine\ORM\Events;
use Doctrine\ORM\Configuration;
use Doctrine\Common\Cache\ArrayCache as Cache;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
//use Doctrine\Common\ClassLoader;

//Configuração do doctrine
$cache = new Cache();
$annotationReader = new AnnotationReader();

$cachedAnnotationReader = new CachedReader(
    $annotationReader,
    $cache
);

$annotationDriver = new AnnotationDriver(
    $cachedAnnotationReader,
    array(__DIR__ . DIRECTORY_SEPARATOR . 'src')
);

$driverChain = new Doctrine\ORM\Mapping\Driver\DriverChain();
$driverChain->addDriver($annotationDriver, 'Common');

$config = new Configuration;
$config->setProxyDir('/tmp');
$config->setProxyNamespace('/Proxy');
$config->setAutoGenerateProxyClasses(true);
$config->setMetadataDriverImpl($driverChain);
$config->setMetadataCacheImpl($cache);
$config->setQueryCacheImpl($cache);
//PATH ##/home/koga/Projetos/agenda/vendor/doctrine/orm/lib/Doctrine/ORM/Mapping/Driver/DoctrineAnnotations.php##
AnnotationRegistry::registerFile(__DIR__. DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'doctrine'.DIRECTORY_SEPARATOR.'orm'.DIRECTORY_SEPARATOR.'lib'.DIRECTORY_SEPARATOR.'Doctrine'.DIRECTORY_SEPARATOR.'ORM'.DIRECTORY_SEPARATOR.'Mapping'.DIRECTORY_SEPARATOR.'Driver'.DIRECTORY_SEPARATOR.'DoctrineAnnotations.php');

$evm = new EventManager();
$em = EntityManager::create(
    array(
        'driver'  => 'pdo_mysql',
        'host'    => '127.0.0.1',
        'port'    => '3306',
        'user'    => 'root',
        'password'=> 'root',
        'dbname'  => 'agendamento'
    ),
    $config,
    $evm
);

$app = new Silex\Application();
$app['debug'] = true;

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/views',
));
