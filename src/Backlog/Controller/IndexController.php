<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 29/02/16
 * Time: 22:36
 */

namespace Backlog\Controller;


use Silex\Application;
use Silex\ControllerProviderInterface;

class IndexController implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $controllerFactory = $app['controllers_factory'];
        $controllerFactory->get('/', 'Backlog\Controller\IndexController::indexAction');

        return $controllerFactory;
    }

    public function indexAction(Application $app)
    {
        return $app['twig']->render('backlog/backlog.html.twig', array('backlog'=>true, 'timeline'=>false));
    }
}