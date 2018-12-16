<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 05/03/2018
 * Time: 15:08
 */

namespace App\Http\Util;

use PEAR2\Net\RouterOS;

require_once base_path() . '/vendor/PEAR2/Autoload.php';

/**
 * The MikrotikUtil Class is responsible for all the information management, requisitions and connection with mikrotik.
 * The MikrotikUtil Class bridges RouterOS, facilitating simple operations such as entering new address records, updating, removing and searching.
 * @package App\Http\Util
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */

Class MikrotikUtil
{
    /**
     * Receive connection client with Mikrotik
     *
     * @var null
     */
    public static $CLIENT = NULL;
    /**
     * Receive the Util class from the Router library
     *
     * @var null
     */
    public static $UTIL = NULL;
    /**
     * Mikrotik's ip
     *
     * @var string
     */
    public static $IP = '172.16.200.166';
    /**
     * admin user by default is 'admin'
     *
     * @var string
     */
    public static $USER = 'admin';
    /**
     * The default password is ''
     *
     * @var string
     */
    public static $PASS = '';

    /**
     * Return connection client with Mikrotik
     *
     * @return object
     */
    public static function Client(){
        return new RouterOS\Client(self::$IP, self::$USER, self::$PASS);
    }

    /**
     * Return the Util class from the Router library
     *
     * @return object
     */
    public static function Util(){
        return new RouterOS\Util(self::client());
    }

    /**
     * Make the request through api directly to mikrotik
     *
     * @param string|$command
     * @return object
     */
    public static function Request($command){
        return new RouterOS\Request($command);
    }


    /**
     * Create a query to filter records within mikrotik
     *
     * @param $name
     * @param $value
     * @param $operator
     * @return object
     */
    public static function Query($name, $value = null, $operator = null){
        return  RouterOS\Query::where($name, $value, $operator);
    }


    /**
     * search the specified log index in the request
     *
     * @param $request
     * @param $query
     * @return array
     */
    public static function exists_register($request, $query){
        $result = false;
        try {
            $printRequest = MikrotikUtil::Request($request);
            $printRequest->setArgument('.proplist', '.id');
            $printRequest->setQuery(
                MikrotikUtil::Query($query[0], $query[1])
            );
            $result = MikrotikUtil::Client()->sendSync($printRequest)->getProperty('.id');
            if(is_null($result))
                $result = false;

        } catch(Exception $e) {
            echo "We're sorry, but we can't determine your MAC address right now.";
        }

        return $result;
    }


    /**
     * Updates a specific index record passed as a parameter
     *
     * @param $request
     * @param $data
     * @return array
     */
    public static function update_register($request, $data){
        $result = false;
        try {
            $index_reg = $data['index'];

            $setRequest = MikrotikUtil::Request($request);
            $setRequest->setArgument('numbers', $index_reg);

            unset($data['index']);
            array_values($data);

            foreach ($data as $key=>$dat){
                $setRequest->setArgument($key, $dat);
            }
            MikrotikUtil::Client()->sendSync($setRequest);

        } catch(Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }


    /**
     * removes a specific index record passed as a parameter
     *
     * @param $request
     * @param $data
     * @return array
     */
    public static function remove_register($request, $data){
        $result = false;
        try {
            $index_reg = $data['index'];

            $setRequest = MikrotikUtil::Request($request);
            $setRequest->setArgument('numbers', $index_reg);

            unset($data['index']);
            array_values($data);

            foreach ($data as $key=>$dat){
                $setRequest->setArgument($key, $dat);
            }
            MikrotikUtil::Client()->sendSync($setRequest);

        } catch(Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

    /**
     * Send a file to the mikrotik file folder
     *
     * @param $destination
     * @param $source
     * @return array
     */
    public static function send_file($destination, $source){
        $result = false;
        try {
            $result = MikrotikUtil::Util()->filePutContents(
                $source,
                file_get_contents($destination)
            );

        } catch(Exception $e) {
            echo $e->getMessage();
        }

        return $result;
    }

}