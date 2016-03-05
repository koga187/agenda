<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 11:08
 */

namespace Common;


use Silex\Application;
use Silex\ControllerProviderInterface;

abstract class AbstractRoute implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        return $app['controller_factory'];
    }

}