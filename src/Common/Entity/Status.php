<?php

/**
 * Created by PhpStorm.
 * User: koga
 * Date: 22/02/16
 * Time: 21:40
 */

namespace Common\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="status")
 */
class Status
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
     * @ORM\Column(type="datetime", name="data_in")
     */
    private $dataIn;
    /**
     * @ORM\Column(type="datetime", name="data_delete", nullable=true)
     */
    private $dataDelete;
    /**
     * @ORM\Column(type="binary", nullable=true)
     */
    private $deleted;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    /**
     * @return mixed
     */
    public function getDataIn()
    {
        return $this->dataIn;
    }

    /**
     * @param mixed $dataIn
     */
    public function setDataIn($dataIn)
    {
        $this->dataIn = $dataIn;
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
     */
    public function setDataDelete($dataDelete)
    {
        $this->dataDelete = $dataDelete;
    }

    /**
     * @return mixed
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param mixed $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }
}