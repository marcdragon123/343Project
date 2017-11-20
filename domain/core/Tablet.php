<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-20
 * Time: 2:00 AM
 */

class Tablet extends Product
{
    private $DisplayDimensions;
    private $DisplaySize;
    private $CPUType;
    private $CoreNumber;
    private $RAMSize;
    private $HDDSize;
    private $Battery;
    private $OS;
    private $CameraInformation;

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
    public function getDisplaySize()
    {
        return $this->DisplaySize;
    }

    /**
     * @param mixed $DisplaySize
     */
    public function setDisplaySize($DisplaySize)
    {
        $this->DisplaySize = $DisplaySize;
    }

    /**
     * @return mixed
     */
    public function getCameraInformation()
    {
        return $this->CameraInformation;
    }

    /**
     * @param mixed $CameraInformation
     */
    public function setCameraInformation($CameraInformation)
    {
        $this->CameraInformation = $CameraInformation;
    }


}