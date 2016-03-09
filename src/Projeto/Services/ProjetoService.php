<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 28/02/16
 * Time: 18:09
 */

namespace Projeto\Services;

use Common\Entity\Projetos;
use Common\Services\AbstractCRUD;

class ProjetoService extends AbstractCRUD
{
    public function create(Projetos $projetoEntity, array $data)
    {
        $areaReference = $this->em->find('Common\Entity\Area', $data['areaId']);
        $projetoEntity->setNome($data['nome'])
            ->setDescricao($data['descricao'])
            ->setAreaId($areaReference)
            ->setDataInicio($data['dataInicio'])
            ->setDataFim($data['dataFim'])
            ->setDataIn($data['dataIn']);

        $this->em->persist($projetoEntity);
        $this->em->flush();

        return $projetoEntity;
    }
}