<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 19/03/2018
 * Time: 17:16
 */

namespace App\Http\Services;


use App\Http\Model\Address;
use App\Http\Model\Pool;
use App\Http\Util\MikrotikUtil;

class PoolService
{
    public static function existsPool($data){
        $index_reg = MikrotikUtil::exists_register("/ip/pool/print",[$data[0], $data[1]]);
        return $index_reg;
    }

    public static function getPool(){
        $data = array();
        $data['pool'] = array();

        try {
            $pool = MikrotikUtil::Util()->setMenu('/ip/pool')->getAll();
            foreach ($pool as $result) {
                $pool = new Pool();
                $pool->create($result->getIterator(), 'API');

                array_push($data['pool'], $pool->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => 'Pool loaded!',
                'result' => $data['pool']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function addPool($data){
        try{
            $pool = new Pool();

            if(!empty($data)) {
                $pool->create($data);

                MikrotikUtil::Util()->setMenu('/ip/pool')->add(
                    $pool->extractVariables('array', true)
                );
                $result = [
                    'id'=> 201,
                    'message' => 'pool created!'
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

    public static function updatePool($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/pool/set',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'pool update!'
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

    public static function removePool($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/ip/pool/remove',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'pool removed!'
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