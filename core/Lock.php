<?php

/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-14
 * Time: 1:25 PM
 */
class Lock implements SplObserver
{
    private $threadsToRun = array();

    /**
     * @return array
     */
    public function getThreadsToRun(): array {
        return $this->threadsToRun;
    }

    /**
     * @param array $threadsToRun
     */
    public function setThreadsToRun(array $threadsToRun) {
        $this->threadsToRun = $threadsToRun;
    } //thread requests to run.

    public function request($object) {
        $array = $this->getThreadsToRun();
        $res=array_push($array, $object);
        if($res>=1) {
            return true;
        }
        else {
            return false;
        }

    }

    function notifyUpdateTable($object) {
        //ToDo Add SQL statements to query DB
    }

    function notifyAddToTable($object) {
        //ToDo Add SQL statements to query DB
    }

    function notifyRemoveFromTable($object) {
        //ToDo Add SQL statements to query DB
    }

    /**
     * Receive update from subject
     * @link http://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * The <b>SplSubject</b> notifying the observer of an update.
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject) {
        // TODO: Implement update() method.
    }
}
?>

