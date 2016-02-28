<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 28/02/16
 * Time: 14:00
 */
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once '../bootstrap.php';
return ConsoleRunner::createHelperSet($em);