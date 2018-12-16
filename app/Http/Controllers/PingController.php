<?php
/**
 * Created by PhpStorm.
 * User: Atos Vinicius
 * Date: 08/03/2018
 * Time: 15:21
 */

namespace App\Http\Controllers;


use App\Http\Model\Ping;
use App\Http\Util\MikrotikUtil;

/**
 * This class is responsible for testing ping
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class PingController
{
    /**
     * this method returns all Pings
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getPing(){

        $data = array();
        $data['address'] = isset($_POST['address']) ? $_POST['address'] : '8.8.8.8';
        $data['results'] = array();

        try {
            $pingRequest = MikrotikUtil::Request('/ping count=3');
            $array_result = MikrotikUtil::Client()->sendSync($pingRequest->setArgument('address', $data['address']));

            foreach ($array_result as $result) {
                $ping = new Ping();
                $ping->create($result->getIterator(), 'API');
                array_push($data['results'], $ping->extractVariables('object'));
            }
        } catch (Exception $e) {
            $data['results'] = false;
        }

        //HEADER JSON
        header('Content-Type: application/json');

        echo json_encode($data['results']);

    }

}