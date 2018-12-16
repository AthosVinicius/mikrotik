<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 21/03/2018
 * Time: 16:02
 */

namespace App\Http\Controllers;


use App\Http\Model\DhcpClient;
use App\Http\Services\DhcpClientService;
use App\Http\Services\DhcpService;

/**
 * This Class is responsible for managing all DHCPs ofs Clients stored in mikrotik
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class DhcpClientController extends Controller
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

        $result = DhcpClientService::getDhcps();

        echo json_encode($result['result']);
    }

    /**
     * this method adds a new DHCP
     *
     * @access public
     */
    public function addDhcp(){
        DhcpClientService::addDhcp($_POST);
    }

    /**
     * this method updates a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function updateDhcp(){
        DhcpClientService::updateDhcp($_POST);
    }

    /**
     * this method removes a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function removeDhcp(){
        DhcpClientService::removeDhcp($_POST);
    }

    /**
     * this method enable a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function enableDhcp(){
        DhcpClientService::enableDhcp($_POST);
    }

    /**
     * this method disable a specified DHCP through the index passed through the post
     *
     * @access public
     */
    public function disableDhcp(){
        DhcpClientService::disableDhcp($_POST);
    }
}