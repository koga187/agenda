<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 28/02/16
 * Time: 18:09
 */

namespace Projeto\Services;

use Common\Entity\Projetos;
use Common\Repository\ProjetosRepository;
use Common\Services\AbstractCRUD;
use Common\Services\EntityHydrator;

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

    public function read()
    {
        $repository = $this->em->getRepository('Common\Entity\Projetos');
        return $repository->getProjetos();
    }

    /**
     * @param $id
     * @return array
     */
    public function readById($id)
    {
        /**
         * @var ProjetosRepository $repository
         */
        $repository = $this->em->getRepository('Common\Entity\Projetos');

        $resProjeto = $repository->getProjetoById($id);

        $dados['id'] = $resProjeto[0]->getId();
        $dados['nome'] = $resProjeto[0]->getNome();
        $dados['descricao'] = $resProjeto[0]->getDescricao();
        $dados['idArea'] = $resProjeto[0]->getAreaId()->getId();
        $dados['dataInicio'] = $resProjeto[0]->getDataInicio()->format('Y-m-d');
        $dados['dataFim'] = $resProjeto[0]->getDataFim()->format('Y-m-d');

        return $dados;
    }

    public function update($data)
    {
        $areaReference = $this->em->find('Common\Entity\Area', $data['areaId']);

        $projetoReference = $this->em->find('Common\Entity\Projetos', $data['id']);

        $projetoReference->setAreaId($areaReference)
            ->setNome($data['nome'])
            ->setDescricao($data['descricao'])
            ->setDataInicio($data['dataInicio'])
            ->setDataFim($data['dataFim']);

        $this->em->persist($projetoReference);
        $this->em->flush();

        return $projetoReference;
    }
}