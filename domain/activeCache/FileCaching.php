<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-11-18
 * Time: 11:00 PM
 */

abstract class FileCaching
{
    private $file;
    private $locked;
    private $fileName;

    public function build($fileName)
    {
        $this->fileName = $fileName;
        $this->file = fopen($fileName,"a+");
    }

    public function destroy()
    {
        fclose($this->file);
    }

    public function acquireReaderLock()
    {
        // TODO: Implement acquireReaderLock() method.
        $this->locked = flock($this->file, LOCK_SH);
    }

    public function releaseLock()
    {
        // TODO: Implement releaseLock() method.
        $this->locked = !flock($this->file, LOCK_UN);

    }

    public function acquireWriterLock()
    {
        // TODO: Implement acquireWriterLock() method.
        $this->locked = flock($this->file, LOCK_EX);
    }

    public function write($object, $toBePurged)
    {
        // TODO: Implement write() method.
        $productSerialized = serialize($object);
        $this->acquireWriterLock();
        if($this->locked) {
            if ($toBePurged)
            {
                $this->purge();
            }
            $val = fwrite($this->file,$productSerialized.PHP_EOL);
            $this->releaseLock();
            return $val;
        }
        else {
            throw new Exception("Could Not Lock");
        }
    }

    public function read($fileName)
    {
        // TODO: Implement read() method.
        $unserializedObj = array();
        $this->acquireReaderLock();
        if($this->locked) {
            $val = fread($this->file, filesize($fileName));
            $this->releaseLock();
            $contents = explode(PHP_EOL, $val);
            foreach ($contents as $obj) {
                array_push($unserializedObj, unserialize($obj));
            }

        }
        else{
            throw new Exception("Could Not Lock");
        }
        return $unserializedObj;
    }

    public function purge()
    {
        ftruncate($this->file, 0);
    }

    public function isEmpty()
    {
        return (filesize($this->fileName)==0);
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

}