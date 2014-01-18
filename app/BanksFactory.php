<?php
/**
 * Created by JetBrains PhpStorm.
 * User: co11ter
 * Date: 10.11.13
 * Time: 16:12
 * To change this template use File | Settings | File Templates.
 */

interface Creator {
    public function FactoryMethod();
}

class CreatorBinBank implements Creator {
    public  function FactoryMethod() {
        require_once 'Banks/BinBank.php';
        return new BinBank();
    }
}