<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 09:49
 */

namespace Backlog;


use Common\AbstractRoute;
use Silex\Application;
use Silex\ControllerProviderInterface;

class Routes extends AbstractRoute implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $routeFactory = $app['controllers_factory'];
        $routeFactory->get('/', 'Backlog\Controller\IndexController::indexAction');
        $routeFactory->get('/projeto/{id}', 'Backlog\Controller\IndexController::projetoAction');
        $routeFactory->get('/{id}', 'Backlog\Controller\BacklogController::readByIdAction');
        $routeFactory->post('/', 'Backlog\Controller\BacklogController::createAction');
        $routeFactory->put('/', 'Backlog\Controller\BacklogController::updateAction');

        return $routeFactory;
    }
}