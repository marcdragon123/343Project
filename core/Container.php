<?php
include ('MyThread.php');
/**
 * Created by Marc-Andre Dragon.
 * Date: 2017-10-14
 * Time: 1:25 PM
 */
class Container implements SplObserver
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

    function notifyUpdateTable($object, $db) {
        //ToDo Add SQL statements to query DB
    }

    function notifyAddToTable($object, $db) {

        $queryStart="INSERT INTO ";
        $serialNumber = $object->getSerialNumber();
        $objectType = $object->getType();

        switch ($objectType)
        {
            case 'Monitor':
                $queryStart.="Monitor_tbl";
                break;
            case 'Tablet':
                $queryStart.="Tablet_tbl";
                break;
            case 'Computer':
                $queryStart.="DesktopComputer_tbl";
                break;
            case 'Laptop':
                $queryStart.="Laptop_tbl";
                break;
        }

        $queryStart.=" ( Key, Value, SerialNumber ) VALUES ";

        foreach ($object->properties as $key=>$val) {
            $query = $queryStart."( ".$key.", ".$val.", ".$serialNumber." )";
            $thread = new MyThread($query, $db);
            $this->request($thread);
        }

        $this->runUpdate();


        //ToDo Add SQL statements to query DB
    }

    function notifyRemoveFromTable($object, $db) {

        $query="DELETE FROM";
        $serialNumber = $object->getSerialNumber();
        $objectType = $object->getType();

        switch ($objectType)
        {
            case 'Monitor':
                $query.="Monitor_tbl";
                break;
            case 'Tablet':
                $query.="Tablet_tbl";
                break;
            case 'Computer':
                $query.="DesktopComputer_tbl";
                break;
            case 'Laptop':
                $query.="Laptop_tbl";
                break;
        }

        $query = $query." WHERE SerialNumber=".$serialNumber;
        $thread = new MyThread($query, $db);

        $this->request($thread);
        $this->runUpdate();


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

    public function runUpdate()
    {
        foreach ($this->getThreadsToRun() as $item) {
            $item->start();
            while (!$item->isTerminated())
            {
                //Time to wait
            }
        }
    }
}
?>

