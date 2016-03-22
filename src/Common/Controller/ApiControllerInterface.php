<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 01/03/2016
 * Time: 10:07
 */

namespace Common\Controller;

use Doctrine\ORM\EntityManager;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ApiControllerInterface
{
    /**
     * @param Application $app
     * @return mixed
     */
    public function createAction(Application $app);

    /**
     * @param Application $app
     * @return mixed
     */
    public function readAction(Application $app);

    /**
     * @param Application $app
     * @return mixed
     */
    public function readByIdAction(Application $app);

    /**
     * @param Application $app
     * @return mixed
     */
    public function updateAction(Application $app);

    /**
     * @param Application $app
     * @return mixed
     */
    public function deleteAction(Application $app);
}