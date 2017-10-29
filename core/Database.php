<?php

include ('Container.php');
/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-14
 * Time: 10:33 AM
 */
$Container= new Container();
$GLOBALS['Container'] = $Container;

class Database implements SplSubject
{

    private $observer;
    private $container;

    function __construct() {
        $this->container = $this->getContainer();
        $this->attach($this->container);
    }

    function __destruct()
    {
        $this->detach($this->observer);
    }

    //access the global array to notify lock of a change
    function getContainer(){
        return $GLOBALS['Container'];
    }


    function updateTable($object){
        $Container = $this->getContainer();
        $Container->notifyUpdateTable($object, $this);
    }

    function addToTable($object){
        $Container = $this->getContainer();
        $Container->notifyAddToTable($object, $this);
    }

    function removeFromTable($object){
        $Container = $this->getContainer();
        $Container->notifyRemoveFromTable($object, $this);
    }

    function successful(){

    }

    function failure(){

    }

    /**
     * Attach an SplObserver
     * @link http://php.net/manual/en/splsubject.attach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to attach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function attach(SplObserver $observer)
    {
        $this->observer = $observer;
    }

    /**
     * Detach an observer
     * @link http://php.net/manual/en/splsubject.detach.php
     * @param SplObserver $observer <p>
     * The <b>SplObserver</b> to detach.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function detach(SplObserver $observer)
    {
        $observer = null;
    }

    /**
     * Notify an observer
     * @link http://php.net/manual/en/splsubject.notify.php
     * @return void
     * @since 5.1.0
     */
    public function notify()
    {

    }
}

?>