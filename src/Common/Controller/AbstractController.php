<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 29/02/16
 * Time: 22:17
 */

namespace Common\Controller;


use Silex\Application;
use Silex\ControllerProviderInterface;

class AbstractController implements ControllerProviderInterface
{
    public function connect(Application $app)
    {
        // TODO: Implement connect() method.
    }
}