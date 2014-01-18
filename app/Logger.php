<?php
/**
 * Created by JetBrains PhpStorm.
 * User: co11ter
 * Date: 02.11.13
 * Time: 22:08
 * To change this template use File | Settings | File Templates.
 */

class Logger {
    static function logSystem($file, $data) {
        $fff = fopen($file, 'a');
        if(!$fff) {
            mail("co11ter01@gmail.com", "I Can't create the log-file", $fff.PHP_EOL.PHP_EOL.print_r(error_get_last(), true));
        }
        foreach($data as $val) {
            fputs($fff, $val);
            fputs($fff, ' | ');
        }
        fclose($fff);
    }
}