<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-17
 * Time: 7:50 AM
 */

interface Dimensions
{
    public function setLengthCm($double);
    public function setWidthCm($double);
    public function setHeightCm($double);
    public function getLengthCm();
    public function getWidthCm();
    public function getHeightCm();

}