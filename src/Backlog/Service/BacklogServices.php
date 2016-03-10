<?php
/**
 * Created by PhpStorm.
 * User: bruno.koga
 * Date: 10/03/2016
 * Time: 19:38
 */

namespace Backlog\Service;


use Common\Repository\TarefasRepository;
use Common\Services\AbstractCRUD;

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
}