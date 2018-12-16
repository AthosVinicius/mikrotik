<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 18/03/2018
 * Time: 20:53
 */

namespace App\Http\Controllers;



use App\Http\Services\InterfacesMikrotikService;

/**
 * This Class is responsible for all Interfaces registers ofs Clients stored in mikrotik
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class InterfaceMikrotikController extends Controller
{
    /**
     * this method returns all registered DHCPs in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getInterface(){
        $result = InterfacesMikrotikService::getInterface();

        //HEADER JSON
        header('Content-Type: application/json');
        echo json_encode($result['result']);
    }

    /**
     * this method disable a specified Interface through the index passed through the post
     *
     * @access public
     */
    public function disabletInterface(){
        InterfacesMikrotikService::disableInterface($_POST);
    }

    /**
     * this method enable a specified Interface through the index passed through the post
     *
     * @access public
     */
    public function enabletInterface(){
        InterfacesMikrotikService::enableInterface($_POST);
    }

    /**
     * this method updates a specified Interface through the index passed through the post
     *
     * @access public
     */
    public function updateInterface(){
        InterfacesMikrotikService::updateInterface($_POST);
    }

}