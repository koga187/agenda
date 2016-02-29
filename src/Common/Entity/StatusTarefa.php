<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 22/02/16
 * Time: 21:46
 */

namespace Common\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="status_tarefa")
 */
class StatusTarefa
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    private $statusId;
    /**
     * @ORM\ManyToOne(targetEntity="Tarefas")
     * @ORM\JoinColumn(name="tarefa_id", referencedColumnName="id")
     */
    private $tarefaId;
    /**
     * @ORM\Column(type="datetime", name="data_in")
     */
    private $dataIn;
    /**
     * @ORM\Column(type="datetime", name="data_out", nullable=true)
     */
    private $dataOut;

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
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * @param mixed $statusId
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;
    }

    /**
     * @return mixed
     */
    public function getTarefaId()
    {
        return $this->tarefaId;
    }

    /**
     * @param mixed $tarefaId
     */
    public function setTarefaId($tarefaId)
    {
        $this->tarefaId = $tarefaId;
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
    public function getDataOut()
    {
        return $this->dataOut;
    }

    /**
     * @param mixed $dataOut
     */
    public function setDataOut($dataOut)
    {
        $this->dataOut = $dataOut;
    }
}