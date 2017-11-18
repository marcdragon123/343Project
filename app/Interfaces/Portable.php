<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-16
 * Time: 2:07 PM
 */

interface Portable
{
    public function setSizeInches($size);
    public function setBatteryType($type);
    public function setOperatingSystem($os);
    public function setHasCamera($bool);
    public function getSizeInches();
    public function getBatteryType();
    public function getOperatingSystem();
    public function getHasCamera();
}