<?php

/**
 * Created by PhpStorm.
 * User: koga
 * Date: 22/02/16
 * Time: 21:35
 */

namespace Common\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Common\Repository\ProjetosRepository")
 * @ORM\Table(name="projeto")
 */
class Projetos
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\generatedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $descricao;
    /**
     * @ORM\Column(type="date", name="data_inicio")
     */
    private $dataInicio;
    /**
     * @ORM\Column(type="date", name="data_fim")
     */
    private $dataFim;
    /**
     * @ORM\Column(type="datetime", name="data_in")
     */
    private $dataIn;
    /**
     * @ORM\Column(type="datetime", name="data_delete", nullable=true)
     */
    private $dataDelete;
    /**
     * @ORM\Column(type="binary", length=255, nullable=true)
     */
    private $deleted;
    /**
     * @ORM\ManyToOne(targetEntity="Area")
     * @ORM\JoinColumn(name="area_id", referencedColumnName="id", nullable=false)
     */
    private $areaId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param $nome
     * @return $this
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param $descricao
     * @return $this
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * @param $dataInicio
     * @return $this
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * @param $dataFim
     * @return $this
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataIn()
    {
        return $this->dataIn;
    }

    /**
     * @param $dataIn
     * @return $this
     */
    public function setDataIn($dataIn)
    {
        $this->dataIn = $dataIn;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataDelete()
    {
        return $this->dataDelete;
    }

    /**
     * @param $dataDelete
     * @return $this
     */
    public function setDataDelete($dataDelete)
    {
        $this->dataDelete = $dataDelete;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param $deleted
     * @return $this
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAreaId()
    {
        return $this->areaId;
    }

    /**
     * @param $areaId
     * @return $this
     */
    public function setAreaId($areaId)
    {
        $this->areaId = $areaId;

        return $this;
    }
}