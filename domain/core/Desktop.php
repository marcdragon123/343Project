<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-20
 * Time: 2:00 AM
 */

class Desktop extends Product
{

    private $Dimensions;
    private $CPUType;
    private $CoreNumber;
    private $RAMSize;
    private $HDDSize;

    public function _construct($type)
    {
        parent::_construct($type);
    }

    /**
     * @return mixed
     */
    public function getDimensions()
    {
        return $this->Dimensions;
    }

    /**
     * @param mixed $Dimensions
     */
    public function setDimensions($Dimensions)
    {
        $this->Dimensions = $Dimensions;
    }

    /**
     * @return mixed
     */
    public function getCPUType()
    {
        return $this->CPUType;
    }

    /**
     * @param mixed $CPUType
     */
    public function setCPUType($CPUType)
    {
        $this->CPUType = $CPUType;
    }

    /**
     * @return mixed
     */
    public function getCoreNumber()
    {
        return $this->CoreNumber;
    }

    /**
     * @param mixed $CoreNumber
     */
    public function setCoreNumber($CoreNumber)
    {
        $this->CoreNumber = $CoreNumber;
    }

    /**
     * @return mixed
     */
    public function getRAMSize()
    {
        return $this->RAMSize;
    }

    /**
     * @param mixed $RAMSize
     */
    public function setRAMSize($RAMSize)
    {
        $this->RAMSize = $RAMSize;
    }

    /**
     * @return mixed
     */
    public function getHDDSize()
    {
        return $this->HDDSize;
    }

    /**
     * @param mixed $HDDSize
     */
    public function setHDDSize($HDDSize)
    {
        $this->HDDSize = $HDDSize;
    }



}