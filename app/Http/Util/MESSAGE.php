<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 22/03/2018
 * Time: 16:45
 */

namespace App\Http\Util;

/**
 * The Message Class is intended to standardize messages resulting from operations performed through the MikrotikUtil class, displaying the following messages
 * @package App\Http\Util
 * @author This code was developed by Atos Vinicius, under the service of MF Info
 * @version initial
 */

class MESSAGE
{
    /**
     * Operation executed with success!
     */
    CONST SUCCESS = "Operation executed with success!";

    /**
     * Created with success!
     */
    CONST CREATED = "Created with success!";

    /**
     * Updated with success!
     */
    CONST UPDATED = "Updated with success!";

    /**
     * Removed with success!
     */
    CONST REMOVED = "Removed with success!";

    /**
     * Data not send!
     */
    CONST DATA_NOT_SEND = "Data not send!";
}