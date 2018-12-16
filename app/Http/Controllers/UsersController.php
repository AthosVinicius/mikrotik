<?php
/**
 * Created by PhpStorm.
 * User: Atos Vinicius
 * Date: 08/03/2018
 * Time: 15:19
 */

namespace App\Http\Controllers;


use App\Http\Model\Profile;
use App\Http\Model\User;
use App\Http\Services\UsersService;
use App\Http\Util\MikrotikUtil;
use Mockery\Exception;
use PEAR2\Net\RouterOS\RouterErrorException;

/**
 * This Class is responsible for managing all Users stored in mikrotik
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class UsersController extends Controller
{
    /**
     * this method returns all registered Users in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getUsers(){

        $result = UsersService::getUsers();

        echo json_encode($result['result']);
    }

    /**
     * this method add a new User
     *
     * @access public
     */
    public function addUser(){
        UsersService::addUser($_POST);
    }

    /**
     * this method updates a specified User through the index passed through the post
     *
     * @access public
     */
    public function updateUser(){
        UsersService::updateUser($_POST);
    }

    /**
     * this method remove a specified User through the index passed through the post
     *
     * @access public
     */
    public function removeUser(){
        UsersService::removeUser($_POST);
    }

    /**
     * this method returns all registered Users Profiles in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getProfiles(){
        header('Content-type: application/json');

        $result = UsersService::getProfiles();

        echo json_encode($result['result']);
    }

    /**
     * this method add a new User Profile
     *
     * @access public
     */
    public function addProfile(){
        UsersService::addProfile($_POST);
    }

    /**
     * this method update a specified User Profile through the index passed through the post
     *
     * @access public
     */
    public function updateProfile(){
        UsersService::updateProfile($_POST);
    }

    /**
     * this method remove a specified User Profile through the index passed through the post
     *
     * @access public
     */
    public function removeProfile(){
        UsersService::removeProfile($_POST);
    }

    /**
     * this method change Password of a specified User through the index passed through the post
     *
     * @access public
     */
    public function changePassword(){

        $errors = array();

        try {


            $printRequest = MikrotikUtil::Request( '/ip/hotspot/user/print');
            $printRequest->setArgument('.proplist', '.id,name');
            $printRequest->setQuery(
                MikrotikUtil::Query('name', $_POST['name'])
            );
            $hotspotUsername = MikrotikUtil::Client()->sendSync($printRequest)->getProperty('name');
            $hotspotUserId = MikrotikUtil::Client()->sendSync($printRequest)->getProperty('.id');

        } catch(Exception $e) {
            $errors[] = $e->getMessage();
        }

        if($hotspotUsername != null) {
            if (isset($_POST['password']) && isset($_POST['password2'])) {
                if ($_POST['password'] !== $_POST['password2']) {
                    $errors[] = 'Passwords do not match.';
                } elseif (empty($errors)) {

                    //Here's the fun part - actually changing the password
                    $setRequest = MikrotikUtil::Request('/ip/hotspot/user/set');
                    $setRequest
                        ->setArgument('numbers', $hotspotUserId)
                        ->setArgument('password', $_POST['password']);
                    MikrotikUtil::Client()->sendSync($setRequest);
                }
            }
        }else{
            $errors[] = 'User not found';
        }

        $data['hotspotUsername'] = $hotspotUsername;
        $data['errors'] = $errors;

        return view('changePassword', $data);
    }

    /**
     * this method get MAC of a specified User through the index passed through the post
     *
     * @access public
     */
    public function getMacByUser(){
        try {

            $printRequest = MikrotikUtil::Request( '/ip/hotspot/user/print');
            $printRequest->setQuery(
                MikrotikUtil::Query('address', '192.168.0.19')
            );
            $mac = MikrotikUtil::Client()->sendSync($printRequest)->getProperty('mac-address');

            if (null !== $mac) {
                echo 'Your MAC address is: ', $mac;
            } else {
                echo "Your ip is not part of our network, and because of that, we can't determine your MAC address.";
            }
        } catch(Exception $e) {
            echo "We're sorry, but we can't determine your MAC address right now.";
        }
    }

}