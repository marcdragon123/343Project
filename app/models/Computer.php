<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-16
 * Time: 9:55 AM
 */

class Computer extends Product
{
    private $processor;
    private $numOfCores;
    private $ramMb;
    private $hardDriveGb;

    /**
     * @return mixed
     */
    public function getProcessor()
    {
        return $this->processor;
    }

    /**
     * @param mixed $processor
     */
    public function setProcessor($processor)
    {
        $this->processor = $processor;
    }

    /**
     * @return mixed
     */
    public function getNumOfCores()
    {
        return $this->numOfCores;
    }

    /**
     * @param mixed $numOfCores
     */
    public function setNumOfCores($numOfCores)
    {
        $this->numOfCores = $numOfCores;
    }

    /**
     * @return mixed
     */
    public function getRamMb()
    {
        return $this->ramMb;
    }

    /**
     * @param mixed $ramMb
     */
    public function setRamMb($ramMb)
    {
        $this->ramMb = $ramMb;
    }

    /**
     * @return mixed
     */
    public function getHardDriveGb()
    {
        return $this->hardDriveGb;
    }

    /**
     * @param mixed $hardDriveGb
     */
    public function setHardDriveGb($hardDriveGb)
    {
        $this->hardDriveGb = $hardDriveGb;
    }


}