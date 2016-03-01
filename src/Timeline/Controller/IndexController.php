<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 10:00
 */

namespace Timeline\Controller;

use Common\Controller\AbstractController;
use Silex\Application;

class IndexController
{

    public function indexAction(Application $app)
    {
        return $app['twig']->render('timeline/timeline.html.twig', array('timeline'=>true, 'backlog'=>false));
    }
}