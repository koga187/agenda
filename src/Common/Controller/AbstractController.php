<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 29/02/16
 * Time: 22:17
 */

namespace Common\Controller;

use Doctrine\ORM\EntityManager;
use Silex\Application;

abstract class AbstractController
{
    protected $em;
    /**
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
}