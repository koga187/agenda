<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 21/03/16
 * Time: 16:08
 */

namespace Common\Repository;


use Doctrine\ORM\EntityRepository;

class StatusTarefaRepository extends EntityRepository
{
    public function getLastStatusTarefaFromBacklog($backLogId)
    {
        $dql = "SELECT st FROM Common\Entity\StatusTarefa st JOIN st.tarefaId t WHERE st.tarefaId = {$backLogId} AND st.dataOut IS NULL";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }
}