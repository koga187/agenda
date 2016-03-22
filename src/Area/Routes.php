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
        $routeFactory->delete('/{id}', 'Area\Controller\AreaController::deleteAction');
        $routeFactory->post('/', 'Area\Controller\AreaController::createAction');
        $routeFactory->get('/', 'Area\Controller\AreaController::readAction');

        return $routeFactory;
    }
}