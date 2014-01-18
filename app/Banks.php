<?php
/**
 * Created by JetBrains PhpStorm.
 * User: co11ter
 * Date: 10.11.13
 * Time: 16:14
 * To change this template use File | Settings | File Templates.
 */
 abstract class Banks {

     /**
      * Adapter
      * @var null
      */
     protected $_db = null;

     /**
      * Массив данных на входе
      * @var array
      */
     protected $_in_data = array();

     /**
      * Массив данных на выходе
      * @var array
      */
     protected $_out_data = array();

     /**
      * Table for write data
      * @var string
      */
     protected $_table = '';

     /**
      * Control field for root table
      * @var string
      */
     protected $_control_field = '';

     public function __construct() {
         $this->_db = DBAdapter::getInstance()->getAdapter();
     }

     public function run(Array $data) {
         $result = false;
         $id= 0;
         $this->_in_data = $data;
         $this->_out_data = $this->mutateData();

         if($this->checkData()) {
            $result = $this->sendData();
         }

         if($result) {
            $id = $this->insertToDB($result);
         }

         return array('id'=>$id, 'control_field'=>$this->_control_field);
     }

     protected function insertToDB($order_id) {
         try {
             $sth = $this->_db->prepare('INSERT INTO '.$this->_table.' (`date`, `request_data`, `order_id`) values(NOW(), :data, :order_id)');
             $sth->execute(array(
                 'data' => serialize($this->_out_data),
                 'order_id' => $order_id
             ));
             return $this->_db->lastInsertId();
         } catch (Exception $e) {
             Logger::logSystem('../logs/system.log', array(date('Y-m-d H:i:s'), $e->getMessage(), $e->getFile().'('.$e->getLine().')'));
             return 0;
         }
     }

     protected abstract function mutateData();

     protected abstract function checkData();

     protected abstract function sendData();
 }