<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 21/03/2018
 * Time: 15:06
 */

namespace App\Http\Services;


use App\Http\Util\MikrotikUtil;

class Services
{
    CONST MESSAGE_SUCCESS = "Users loaded!";


    public static function existsReg($request, $data){
        $index_reg = MikrotikUtil::exists_register($request, [$data[0], $data[1]]);
        return $index_reg;
    }
}