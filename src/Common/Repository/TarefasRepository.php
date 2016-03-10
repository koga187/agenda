<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 10/03/2016
 * Time: 19:40
 */

namespace Common\Repository;


use Doctrine\ORM\EntityRepository;

class TarefasRepository extends EntityRepository
{
    public function getBackLogFromProjeto($idProjeto)
    {
        $dql = "SELECT t FROM Common\Entity\Tarefas t WHERE t.projetoid = {$idProjeto}";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }
}