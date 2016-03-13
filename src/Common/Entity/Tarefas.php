<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 22/02/16
 * Time: 21:41
 */

namespace Common\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Common\Repository\TarefasRepository")
 * @ORM\Table(name="tarefa")
 */
class Tarefas
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
     * @ORM\Column(type="smallint")
     */
    private $hora;
    /**
     * @ORM\Column(type="datetime", name="data_inicio")
     */
    private $dataInicio;
    /**
     * @ORM\Column(type="datetime", name="data_fim")
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
     * @ORM\Column(type="binary", nullable=true)
     */
    private $deleted;
    /**
     * @ORM\ManyToOne(targetEntity="Projetos")
     * @ORM\JoinColumn(name="projeto_id", referencedColumnName="id")
     */
    private $projetoid;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param $hora
     * @return $this
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

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
    public function getProjetoid()
    {
        return $this->projetoid;
    }

    /**
     * @param $projetoid
     * @return $this
     */
    public function setProjetoid($projetoid)
    {
        $this->projetoid = $projetoid;

        return $this;
    }
}