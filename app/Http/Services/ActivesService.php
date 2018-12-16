<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 15/03/2018
 * Time: 17:48
 */

namespace App\Http\Services;

use App\Http\Model\ActivePPP;
use App\Http\Util\MESSAGE;
use App\Http\Util\MikrotikUtil;

class ActivesService extends Services
{
    public static function getActives(){
        $data = array();
        $data['actives'] = array();

        try {
            $actives = MikrotikUtil::Util()->setMenu('/ppp/active')->getAll();
            foreach ($actives as $result) {
                $active = new ActivePPP();
                $active->create($result->getIterator(), 'API');
                array_push($data['actives'], $active->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => MESSAGE::SUCCESS,
                'result' => $data['actives']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }
}