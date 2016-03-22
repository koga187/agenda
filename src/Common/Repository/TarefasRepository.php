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
        $dql = "SELECT
                  st.id statusTarefaId,
                  t.id,
                  t.nome,
                  t.descricao,
                  t.hora,
                  t.id,
                  s.id statusId
              FROM Common\Entity\StatusTarefa st
              JOIN st.tarefaId t
              JOIN st.statusId s
              WHERE
                t.projetoid = {$idProjeto}
                AND st.dataOut IS NULL
                AND t.dataDelete IS NULL";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }

    /**
     * @param $idTarefa
     * @return array
     */
    public function getTarefaById($idTarefa)
    {
        $dql = "SELECT t FROM Common\Entity\Tarefas t WHERE t.id = {$idTarefa}";

        return $this->getEntityManager()
            ->createQuery($dql)
            ->getResult();
    }
}