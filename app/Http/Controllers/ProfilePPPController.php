<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 23/03/2018
 * Time: 18:02
 */

namespace App\Http\Controllers;


use App\Http\Services\ProfilePPPService;

/**
 * This Class is responsible for managing all Profiles in mikrotik
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class ProfilePPPController extends Controller
{
    /**
     * this method returns all registered Profiles in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getProfiles(){
        $result = ProfilePPPService::getProfiles();

        echo json_encode($result['result']);
    }

    /**
     * this method adds a new Profiles
     *
     * @access public
     */
    public function addProfile(){
        ProfilePPPService::addProfile($_POST);
    }

    /**
     * this method updates a specified Profiles through the index passed through the post
     *
     * @access public
     */
    public function updateProfile(){
        ProfilePPPService::updateProfile($_POST);
    }

    /**
     * this method removes a specified Profiles through the index passed through the post
     *
     * @access public
     */
    public function removeProfile(){
        ProfilePPPService::removeProfile($_POST);
    }
}