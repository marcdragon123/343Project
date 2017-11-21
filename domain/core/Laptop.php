<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-20
 * Time: 2:01 AM
 */

class Laptop extends Product
{

    private $DisplayDimensions;
    private $CPUType;
    private $CoreNumber;
    private $RAMSize;
    private $HDDSize;
    private $Battery;
    private $OS;
    private $ToucheScreenToggle;
    private $CameraToggle;

    public function __construct()
    {
        parent::__construct('Laptop');
    }

    /**
     * @return mixed
     */
    public function getDisplayDimensions()
    {
        return $this->DisplayDimensions;
    }

    /**
     * @param mixed $DisplayDimensions
     */
    public function setDisplayDimensions($DisplayDimensions)
    {
        $this->DisplayDimensions = $DisplayDimensions;
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

    /**
     * @return mixed
     */
    public function getBattery()
    {
        return $this->Battery;
    }

    /**
     * @param mixed $Battery
     */
    public function setBattery($Battery)
    {
        $this->Battery = $Battery;
    }

    /**
     * @return mixed
     */
    public function getOS()
    {
        return $this->OS;
    }

    /**
     * @param mixed $OS
     */
    public function setOS($OS)
    {
        $this->OS = $OS;
    }

    /**
     * @return mixed
     */
    public function getToucheScreenToggle()
    {
        return $this->ToucheScreenToggle;
    }

    /**
     * @param mixed $ToucheScreenToggle
     */
    public function setToucheScreenToggle($ToucheScreenToggle)
    {
        $this->ToucheScreenToggle = $ToucheScreenToggle;
    }

    /**
     * @return mixed
     */
    public function getCameraToggle()
    {
        return $this->CameraToggle;
    }

    /**
     * @param mixed $CameraToggle
     */
    public function setCameraToggle($CameraToggle)
    {
        $this->CameraToggle = $CameraToggle;
    }

}