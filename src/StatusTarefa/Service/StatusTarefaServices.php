<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 21/03/16
 * Time: 08:59
 */

namespace StatusTarefa\Service;


use Common\Entity\StatusTarefa;
use Common\Repository\StatusTarefaRepository;
use Common\Services\AbstractCRUD;

class StatusTarefaServices extends AbstractCRUD
{
    /**
     * @param StatusTarefa $entity
     * @param array $data
     * @return StatusTarefa
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function create(StatusTarefa $entity, $data)
    {
        $referenceStatus = $this->em->find('Common\Entity\Status', $data['statusId']);
        $referenceTarefa = $this->em->find('Common\Entity\Tarefas', $data['tarefaId']);

        $entity->setDataIn($data['dataIn'])
            ->setTarefaId($referenceTarefa)
            ->setStatusId($referenceStatus);

        $this->em->persist($entity);
        $this->em->flush();

        return $entity;
    }

    /**
     * @param $tarefaId
     */
    public function updateOldStatus($tarefaId)
    {
        /**
         * @var StatusTarefaRepository $repository
         */
        $repository = $this->em->getRepository('Common\Entity\StatusTarefa');

        $resLastStatusTarefa = $repository->getLastStatusTarefaFromBacklog($tarefaId);

        $resLastStatusTarefa[0]->setDataOut(new \DateTime('now'));

        $this->em->persist($resLastStatusTarefa[0]);
        $this->em->flush();
    }
}