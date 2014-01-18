<?php
/**
 * Created by JetBrains PhpStorm.
 * User: co11ter
 * Date: 09.11.13
 * Time: 22:01
 * To change this template use File | Settings | File Templates.
 */

class DBAdapter {

    const DSN  = 'mysql:dbname=****;host=127.0.0.1;port=3306';
    const USER = '****';
    const PASS = '****';

    /**
     * @var null
     */
    protected static $instanse = null;

    /**
     * @var null
     */
    protected $adapter = null;

    private function __construct(){
        try {
            $this->adapter = new PDO(self::DSN,self::USER,self::PASS);
            $this->adapter->query('SET NAMES UTF8');
        } catch(PDOException $e) {
            Logger::logSystem('../logs/system.log', array(date('Y-m-d H:i:s'), $e->getMessage(), $e->getFile().'('.$e->getLine().')'));
        }
    }

    private function __clone(){}
    private function __wakeup(){}

    public static function getInstance(){
        if(empty(self::$instanse)) {
            $class = __CLASS__;
            self::$instanse = new $class();
        }
        return self::$instanse;
    }

    public function getAdapter(){
        return $this->adapter;
    }
}