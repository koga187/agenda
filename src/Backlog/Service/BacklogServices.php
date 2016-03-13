<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 10/03/2016
 * Time: 19:38
 */

namespace Backlog\Service;


use Common\Entity\Tarefas;
use Common\Repository\TarefasRepository;
use Common\Services\AbstractCRUD;
use Doctrine\ORM\EntityManager;

class BacklogServices extends AbstractCRUD
{
    public function getBacklogByProjetcId($idProjeto)
    {
        /**
         * @var TarefasRepository $repository
         */
        $repository = $this->em->getRepository('Common\Entity\Tarefas');

        return $repository->getBackLogFromProjeto($idProjeto);
    }

    /**
     * @param $data
     * @return Tarefas
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function create($data)
    {
        $projectReference = $this->em->find('Common\Entity\Projetos', $data['projetoId']);

        $tarefaEntity = new Tarefas();

        $tarefaEntity->setNome($data['nome'])
            ->setDescricao($data['descricao'])
            ->setHora($data['hora'])
            ->setDataInicio($data['dataInicio'])
            ->setDataFim($data['dataFim'])
            ->setProjetoid($projectReference)
            ->setDataIn($data['dataIn']);

        $this->em->persist($tarefaEntity);
        $this->em->flush();

        return $tarefaEntity;
    }
}