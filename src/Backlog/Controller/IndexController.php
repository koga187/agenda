<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 29/02/16
 * Time: 22:36
 */

namespace Backlog\Controller;

use Common\Controller\AbstractController;
use Silex\Application;

class IndexController
{
    public function indexAction(Application $app)
    {
        return $app['twig']->render('backlog/backlog.html.twig', array('backlog'=>true, 'timeline'=>false));
    }
}