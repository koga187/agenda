<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 21/03/16
 * Time: 08:59
 */

namespace StatusTarefa\Service;


use Common\Entity\StatusTarefa;
use Common\Services\AbstractCRUD;

class StatusTarefaServices extends AbstractCRUD
{
    public function create(StatusTarefa $entity, $data)
    {
        $referenceStatus = $this->em->find('Common\Entity\Status', $data['statusId']);
        $entity->setDataIn($data['dataIn'])
            ->setTarefaId($data['tarefaId'])
            ->setStatusId($referenceStatus);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }
}