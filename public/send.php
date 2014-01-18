<?php
/**
 * Created by JetBrains PhpStorm.
 * User: co11ter
 * Date: 02.11.13
 * Time: 1:48
 * To change this template use File | Settings | File Templates.
 */
header('Content-Type: text/html; charset=UTF-8');
$output = 'Нет данных для отправки';

if($_POST) {

    include_once('../app/Sender.php');
    $sender = new Sender();
    $result = $sender->run($_POST);

    if($result) {
        $output = file_get_contents('success.html');
    } else {
        $output = file_get_contents('failure.html');
    }
}
echo $output;