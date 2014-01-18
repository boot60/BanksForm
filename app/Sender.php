<?php
/**
 * Created by JetBrains PhpStorm.
 * User: co11ter
 * Date: 02.11.13
 * Time: 21:45
 * To change this template use File | Settings | File Templates.
 */

class Sender {

    const ROOT_TABLE = 'credit_requests';

    /**
     * @var PDO
     */
    private $_db = null;

    /**
     * Config array for send requests
     * @var array
     */
    private $_config = array();

    /**
     * ID записи в главной таблице
     * @var int
     */
    private $_last_id = 0;

    public function __construct() {
        $config = '';
        $this->autoload();
        $this->_db = DBAdapter::getInstance()->getAdapter();

        require_once 'Config.php';
        $this->_config = $config;
    }

    public function run(Array $data) {
        $result = array();
        $success = false;

        if($this->insertToRootTable($data)) {

            foreach($this->_config as $obj) {
                $result[] = $res = $obj->FactoryMethod()->run($data);
                if($res['id']) $success = true;
            }

            $this->updateToRootTable($result);
        }

        return $success;
    }

    private function insertToRootTable(Array $data){
        try {
            $sth = $this->_db->prepare('INSERT INTO '.self::ROOT_TABLE.' (`date`, `request_data`) values(NOW(), :data)');
            $sth->execute(array(
                'data' => serialize($data)
            ));
            $this->_last_id = $this->_db->lastInsertId();
            return true;
        } catch (Exception $e) {
            Logger::logSystem('../logs/system.log', array(date('Y-m-d H:i:s'), $e->getMessage(), $e->getFile().'('.$e->getLine().')'));
            return false;
        }
    }

    private function updateToRootTable(Array $data) {
        $set = array();
        foreach($data as $val) {
            $set[] = $val['control_field'].'='.$val['id'];
        }
        if($set) {
            $sql = '
                    UPDATE '.self::ROOT_TABLE.'
                    SET '.implode(',',$set).'
                    WHERE id ='.$this->_last_id
            ;
            $this->_db->query($sql);
        }
        return true;
    }

    private function autoload() {
        require_once 'DBAdapter.php';
        require_once 'Logger.php';
        require_once 'Banks.php';
        require_once 'BanksFactory.php';
    }
}