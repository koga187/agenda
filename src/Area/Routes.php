<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 05/03/16
 * Time: 15:59
 */

namespace Area;


use Common\AbstractRoute;
use Silex\Application;
use Silex\ControllerProviderInterface;

class Routes extends AbstractRoute implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $routeFactory = $app['controllers_factory'];
        $routeFactory->post('/', 'Area\Controller\AreaController::createAction');

        return $routeFactory;
    }
}