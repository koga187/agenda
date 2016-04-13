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

class BacklogServices extends AbstractCRUD
{
    public function getBacklogByProjectId($idProjeto)
    {
        /**
         * @var TarefasRepository $repository
         */
        $repository = $this->em->getRepository('Common\Entity\Tarefas');
        $resBackLog = $repository->getBackLogFromProjeto($idProjeto);

        $arrayReturn = [];

        if(count($resBackLog) > 0) {
            foreach($resBackLog as $backlog) {
                $arrayReturn[] = array(
                    'nome' => $backlog['nome'],
                    'descricao' => $backlog['descricao'],
                    'hora' => $backlog['hora'],
                    'id' => $backlog['id'],
                    'statusId' => $backlog['statusId']
                );
            }
        }

        return $arrayReturn;
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

        $horas = $data['dataInicio']->diff($data['dataFim']);

        $horaBacklog = $horas->h;
        $horaBacklog += $horas->d * 8;

        $tarefaEntity->setNome($data['nome'])
            ->setDescricao($data['descricao'])
            ->setHora($horaBacklog)
            ->setDataInicio($data['dataInicio'])
            ->setDataFim($data['dataFim'])
            ->setProjetoid($projectReference)
            ->setDataIn($data['dataIn']);

        $this->em->persist($tarefaEntity);
        $this->em->flush();

        return $tarefaEntity;
    }

    /**
     * @param $id
     * @return array
     */
    public function readById($id)
    {
        $repository = $this->em->getRepository('Common\Entity\Tarefas');

        $resProjeto = $repository->getTarefaById($id);

        $dados['id'] = $resProjeto[0]->getId();
        $dados['nome'] = $resProjeto[0]->getNome();
        $dados['descricao'] = $resProjeto[0]->getDescricao();
        $dados['hora'] = $resProjeto[0]->getHora();
        $dados['dataInicio'] = $resProjeto[0]->getDataInicio()->format('Y-m-d');
        $dados['dataFim'] = $resProjeto[0]->getDataFim()->format('Y-m-d');

        return $dados;
    }

    /**
     * @param $dados
     * @return null|object
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     * @throws \Doctrine\ORM\TransactionRequiredException
     */
    public function update($dados)
    {
        $projetoReference = $this->em->find('Common\Entity\Projetos', $dados['projetoId']);
        $tarefaReference = $this->em->find('Common\Entity\Tarefas', $dados['id']);


        $horas = $dados['dataInicio']->diff($dados['dataFim']);

        $horaBacklog = $horas->h;
        $horaBacklog += $horas->d * 8;

        $tarefaReference->setNome($dados['nome'])
            ->setDescricao($dados['descricao'])
            ->setHora($horaBacklog)
            ->setDataInicio($dados['dataInicio'])
            ->setdataFim($dados['dataFim'])
            ->setProjetoid($projetoReference);

        $this->em->persist($tarefaReference);
        $this->em->flush();

        return $tarefaReference;
    }
}