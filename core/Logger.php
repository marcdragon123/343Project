<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-29
 * Time: 10:38 AM
 */

class Logger
{
    private $handle = null;

    public function __construct($file = '../Logs/Log') {
        $ending = '.txt';
        $this->handle = fopen($file.$ending, 'a+');
        $int=0;
        if($this->handle==false) {
            while(!($this->handle == false && (get_resource_type($this->handle) == 'stream'))) {
                $int++;
                $this->handle = fopen($file.$int.$ending, 'a+');
            }
        }
    }

    public function __destruct() {
        $handle = $this->getHandle();
        fclose($handle);
    }

    public function Log($information) {
        $handle = $this->getHandle();
        return fwrite($handle,$information);
    }

    public function getHandle() {
        return $this->handle;
    }

    public function setHandle($handel) {
        $this->handle= $handel;
    }

}