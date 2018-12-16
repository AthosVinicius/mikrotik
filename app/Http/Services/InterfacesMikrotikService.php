<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 15/03/2018
 * Time: 17:48
 */

namespace App\Http\Services;

use App\Http\Model\InterfaceMikrotik;
use App\Http\Util\MikrotikUtil;

class InterfacesMikrotikService
{
    public static function existsInterface($data){
        $index_reg = MikrotikUtil::exists_register("/interface/print",[$data[0], $data[1]]);
        return $index_reg;
    }

    public static function getInterface(){

        $data = array();
        $data['interface'] = array();

        try {
            $interface = MikrotikUtil::Util()->setMenu('/interface')->getAll();
            foreach ($interface as $result) {
                $interfaceMikrotik = new InterfaceMikrotik();
                $interfaceMikrotik->create($result->getIterator(), 'API');
                array_push($data['interface'], $interfaceMikrotik->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => 'interfaces loaded!',
                'result' => $data['interface']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function enableInterface($data){
        try{
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/interface/enable',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'Interface enabled!'
                ];
            }else{
                $result = [
                    'id'=> 400,
                    'message' => 'data not send'
                ];
            }
        }catch (Exception $e){
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }
        return $result;
    }

    public static function disableInterface($data){

        try{
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/interface/disable',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'Interface disabled!'
                ];
            }else{
                $result = [
                    'id'=> 400,
                    'message' => 'data not send'
                ];
            }
        }catch (Exception $e){
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }
        return $result;
    }

    public static function updateInterface($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/interface/set',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'Interface upda!'
                ];
            }else{
                $result = [
                    'id'=> 400,
                    'message' => 'data not send'
                ];
            }
        }catch (RouterErrorException $e){
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

}