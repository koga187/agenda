<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 10:02
 */

namespace Projeto;


use Common\AbstractRoute;
use Silex\Application;
use Silex\ControllerProviderInterface;

class Routes extends AbstractRoute implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        $routeFactory = $app['controllers_factory'];
        $routeFactory->post('/', 'Projeto\Controller\ProjetoController::createAction');
        $routeFactory->put('/{id}', 'Projeto\Controller\ProjetoController::updateAction');
        $routeFactory->get('/', 'Projeto\Controller\ProjetoController::readAction');
        $routeFactory->get('/{id}', 'Projeto\Controller\ProjetoController::readByIdAction');
        $routeFactory->get('/{id}/backlogs', 'Projeto\Controller\ProjetoController::getBacklogsAction');

        return $routeFactory;
    }
}