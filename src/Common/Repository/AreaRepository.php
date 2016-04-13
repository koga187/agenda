<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 22/03/16
 * Time: 16:30
 */

namespace Common\Repository;


use Doctrine\ORM\EntityRepository;

class AreaRepository extends EntityRepository
{
    public function getAreaAndEmailsByAreaId($areaId)
    {
        $dql = "SELECT
                  a.id,
                  a.nome,
                  a.descricao,
                  e.id as idEmail,
                  e.email,
                  e.nome as nomeEmail
                FROM
                  Common\Entity\Area a
                LEFT JOIN
                  Common\Entity\Email e WITH e.areaId = a
                WHERE e.deleted IS NULL AND a.id = {$areaId}";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }
}