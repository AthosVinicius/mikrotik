<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 21/03/2018
 * Time: 16:02
 */

namespace App\Http\Controllers;


use App\Http\Services\DhcpService;

/**
 * This Class is responsible for managing all DHCPs server stored in mikrotik
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class DhcpController extends Controller
{
    /**
     * this method returns all registered DHCPs in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getDhcps(){
        header('Content-type: application/json');

        $result = DhcpService::getDhcps();

        echo json_encode($result['result']);
    }

    /**
     * this method adds a new DHCP
     *
     * @access public
     */
    public function addDhcp(){
        DhcpService::addDhcp($_POST);
    }

    /**
     * this method updates a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function updateDhcp(){
        DhcpService::updateDhcp($_POST);
    }

    /**
     * this method removes a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function removeDhcp(){
        DhcpService::removeDhcp($_POST);
    }

    /**
     * this method enable a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function enableDhcp(){
        DhcpService::enableDhcp($_POST);
    }

    /**
     * this method disable a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function disableDhcp(){
        DhcpService::disableDhcp($_POST);
    }
}