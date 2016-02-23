<?php

/**
 * Created by PhpStorm.
 * User: koga
 * Date: 22/02/16
 * Time: 21:35
 */

namespace Common\Entity;

class Project
{
    private $id;

    private $nome;

    private $descricao;

    private $dataIn;

    private $daataDelete;

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
    public function getDaataDelete()
    {
        return $this->daataDelete;
    }

    /**
     * @param mixed $daataDelete
     */
    public function setDaataDelete($daataDelete)
    {
        $this->daataDelete = $daataDelete;
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