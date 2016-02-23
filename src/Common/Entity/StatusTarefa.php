<?php
/**
 * Created by PhpStorm.
 * User: koga
 * Date: 22/02/16
 * Time: 21:46
 */

namespace Common\Entity;


class StatusTarefa
{
    private $statusId;

    private $tarefaId;

    private $dataIn;

    private $dataOut;

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