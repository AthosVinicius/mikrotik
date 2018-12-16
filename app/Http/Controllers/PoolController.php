<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 21/03/2018
 * Time: 11:46
 */

namespace App\Http\Controllers;


use App\Http\Services\PoolService;

/**
 * This class is responsible for managing all Pools stored in mikrotik
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class PoolController extends Controller
{
    /**
     * this method returns all registered Pools in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public function getPool(){
        header('Content-type: application/json');

        $result = PoolService::getPool();

        echo json_encode($result['result']);
    }

    /**
     * this method adds a new Pool
     *
     * @access public
     */
    public function addPool(){
        PoolService::addPool($_POST);
    }

    /**
     * this method updates a new Pool
     *
     * @access public
     */
    public function updatePool(){
        PoolService::updatePool($_POST);
    }

    /**
     * this method removes a new Pool
     *
     * @access public
     */
    public function removePool(){
        PoolService::removePool($_POST);
    }
}