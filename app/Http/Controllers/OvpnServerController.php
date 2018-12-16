<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 23/03/2018
 * Time: 17:31
 */

namespace App\Http\Controllers;


use App\Http\Services\OvpnServerService;

/**
 * This class is responsible for the management of Ovpn servers registered in mikrotik
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class OvpnServerController extends Controller
{
    /**
     * this method returns all registered Ovpns in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getOvpns(){
        $result = OvpnServerService::getOvpns();

        echo json_encode($result['result']);
    }

    /**
     * this method adds a new Ovpn
     *
     * @access public
     */
    public function addOvpn(){
        OvpnServerService::addOvpn($_POST);
    }

    /**
     * this method updates a specified Ovpn through the index passed through the post
     *
     * @access public
     */
    public function updateOvpn(){
        OvpnServerService::updateOvpn($_POST);
    }


    /**
     * this method remove a specified Ovpn through the index passed through the post
     *
     * @access public
     */
    public function removeOvpn(){
        OvpnServerService::removeOvpn($_POST);
    }
}