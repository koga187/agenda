<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 10/03/2016
 * Time: 17:50
 */

namespace Common\Repository;


use Doctrine\ORM\EntityRepository;

class ProjetosRepository extends EntityRepository
{
    /**
     * @param $id
     * @return array
     */
    public function getProjetoById($id)
    {
        $dql = "SELECT p FROM Common\Entity\Projetos p WHERE p.id = {$id}";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }
}