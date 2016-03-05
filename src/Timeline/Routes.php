<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 09:58
 */

namespace Timeline;


use Common\AbstractRoute;
use Common\Controller\AbstractController;
use Silex\Application;
use Silex\ControllerProviderInterface;

class Routes extends AbstractRoute implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $routeFactory = $app['controllers_factory'];
        $routeFactory->get('/', 'Timeline\Controller\IndexController::indexAction');

        return $routeFactory;
    }
}