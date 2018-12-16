<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 23/03/2018
 * Time: 18:22
 */

namespace App\Http\Controllers;


use App\Http\Services\ActivesService;


/**
 * This class is responsible for managing all active connections.
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class ActivesPPPController extends Controller
{
    /**
     * This method returns all active connections in mikrotik
     *
     * @return mixed
     */
    public function getActives(){
        $result = ActivesService::getActives();

        return $result['result'];
    }
}