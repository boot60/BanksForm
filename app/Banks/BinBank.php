<?php
/**
 * Created by JetBrains PhpStorm.
 * User: co11ter
 * Date: 10.11.13
 * Time: 16:55
 * To change this template use File | Settings | File Templates.
 */

class BinBank extends Banks {

    /**
     * Adapter
     * @var null
     */
//    protected $_db = null;

    /**
     * Массив данных на входе
     * @var array
     */
//    protected $_in_data = array();

    /**
     * Массив данных на выходе
     * @var array
     */
//    protected $_out_data = array();

    /**
     * Table for write data
     * @var string
     */
    protected $_table = 'send_form_binbank';

    /**
     * Control field for root table
     * @var string
     */
    protected $_control_field = 'binbank_id';

    protected function mutateData() {
        $data = $this->_in_data;
        switch($data['region_id']) {
            case 77:
                $data['region'] = 'Moscow';
                break;
            case 78:
                $data['region'] = 'Saint Petersburg';
                break;
            case 22:
                $data['region'] = 'Altai krai';
                break;
            case 28:
                $data['region'] = 'Amur oblast';
                break;
            case 30:
                $data['region'] = 'Astrakhan oblast';
                break;
            case 31:
                $data['region'] = 'Belgorod oblast';
                break;
            case 32:
                $data['region'] = 'Bryansk oblast';
                break;
            case 33:
                $data['region'] = 'Vladimir oblast';
                break;
            case 34:
                $data['region'] = 'Volgograd oblast';
                break;
            case 35:
                $data['region'] = 'Vologda oblast';
                break;
            case 36:
                $data['region'] = 'Voronezh oblast';
                break;
            case 75:
                $data['region'] = 'Zabaykalsky krai';
                break;
            case 37:
                $data['region'] = 'Ivanovo oblast';
                break;
            case 38:
                $data['region'] = 'Irkutsk oblast';
                break;
            case 39:
                $data['region'] = 'Kaliningrad oblast';
                break;
            case 40:
                $data['region'] = 'Kaluga oblast';
                break;
            case 42:
                $data['region'] = 'Kemerovo oblast';
                break;
            case 43:
                $data['region'] = 'Kirov oblast';
                break;
            case 44:
                $data['region'] = 'Kostroma oblast';
                break;
            case 23:
                $data['region'] = 'Krasnodar krai';
                break;
            case 24:
                $data['region'] = 'Krasnoyarsk krai';
                break;
            case 46:
                $data['region'] = 'Kursk oblast';
                break;
            case 47:
                $data['region'] = 'Leningrad oblast';
                break;
            case 48:
                $data['region'] = 'Lipetsk oblast';
                break;
            case 50:
                $data['region'] = 'Moscow oblast';
                break;
            case 51:
                $data['region'] = 'Murmansk oblast';
                break;
            case 52:
                $data['region'] = 'Nizhny Novgorod oblast';
                break;
            case 53:
                $data['region'] = 'Veliky Novgorod oblast';
                break;
            case 54:
                $data['region'] = 'Novosibirsk oblast';
                break;
            case 55:
                $data['region'] = 'Omsk oblast';
                break;
            case 56:
                $data['region'] = 'Orenburg oblast';
                break;
            case 58:
                $data['region'] = 'Penza oblast';
                break;
            case 59:
                $data['region'] = 'Perm krai';
                break;
            case 25:
                $data['region'] = 'Primorsky krai';
                break;
            case 60:
                $data['region'] = 'Pskov oblast';
                break;
            case 01:
                $data['region'] = 'Republic of Adygea';
                break;
            case 02:
                $data['region'] = 'Republic of Bashkortostan';
                break;
            case 03:
                $data['region'] = 'Republic of Buryatia';
                break;
            case 11:
                $data['region'] = 'Komi republic';
                break;
            case 16:
                $data['region'] = 'Republic of Tatarstan';
                break;
            case 18:
                $data['region'] = 'Udmurt republic';
                break;
            case 19:
                $data['region'] = 'Republic of Khakassia';
                break;
            case 21:
                $data['region'] = 'Chuvash republic';
                break;
            case 61:
                $data['region'] = 'Rostov oblast';
                break;
            case 62:
                $data['region'] = 'Ryazan oblast';
                break;
            case 63:
                $data['region'] = 'Samara oblast';
                break;
            case 64:
                $data['region'] = 'Saratov oblast';
                break;
            case 66:
                $data['region'] = 'Sverdlovsk oblast';
                break;
            case 67:
                $data['region'] = 'Smolensk region';
                break;
            case 26:
                $data['region'] = 'Stavropol krai';
                break;
            case 68:
                $data['region'] = 'Tambov region';
                break;
            case 69:
                $data['region'] = 'Tver oblast';
                break;
            case 70:
                $data['region'] = 'Tomsk oblast';
                break;
            case 71:
                $data['region'] = 'Tula oblast';
                break;
            case 72:
                $data['region'] = 'Tyumen oblast';
                break;
            case 27:
                $data['region'] = 'Khabarovsk krai';
                break;
            case 86:
                $data['region'] = 'Khanty-Mansi autonomous okrug';
                break;
            case 74:
                $data['region'] = 'Chelyabinsk oblast';
                break;
            case 89:
                $data['region'] = 'Yamalo-Nenets autonomous okrug';
                break;
            case 76:
                $data['region'] = 'Yaroslavl oblast';
                break;
        }
        unset($data['region_id']);

        return $data;
    }

    protected function checkData() {
        return true;
    }

    protected function sendData() {
        //https://anketa.binbank.ru/smart_credit_new/

        return rand(1000000,9999999);
    }
}