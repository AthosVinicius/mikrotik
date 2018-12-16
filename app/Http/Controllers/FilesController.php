<?php
/**
 * Created by PhpStorm.
 * User: Atos vinicius
 * Date: 21/03/2018
 * Time: 11:46
 */

namespace App\Http\Controllers;

use App\Http\Services\FileService;

/**
 * This class is intended to manage files stored in the mikrotik file directory through an API
 *
 *
 *
 * @package App\Http\Controllers
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */
class FilesController extends Controller
{
    /**
     * this method returns the list of files stored in mikrotik
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public static function getFiles(){

        $result = FileService::getFiles();

        return $result['result'];
    }

    /**
     * This method sends a selected file to the mikrotik directory
     *
     *
     *
     * @return array returns all records
     * @access public
     */
    public static function sendFile(){
        FileService::sendFile($_POST);
    }

    /**
     * this method removes a specified file through the index passed through the post
     *
     * @access public
     */
    public static function removeFile(){
        FileService::removeFile($_POST);
    }
}
