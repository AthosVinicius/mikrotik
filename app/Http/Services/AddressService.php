<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 19/03/2018
 * Time: 17:16
 */

namespace App\Http\Services;


use App\Http\Model\Address;
use App\Http\Util\MikrotikUtil;

class AddressService
{
    public static function getAddress(){
        $data = array();
        $data['address'] = array();

        try {
            $users = MikrotikUtil::Util()->setMenu('/ip/address')->getAll();
            foreach ($users as $result) {
                $address = new Address();
                $address->create($result->getIterator(), 'API');

                array_push($data['address'], $address->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => 'Address loaded!',
                'result' => $data['address']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function addAddress($data){
        try{
            $address = new Address();

            if(!empty($data)) {
                $address->create($data);

                var_dump($address->extractVariables('array', true));
                MikrotikUtil::Util()->setMenu('/ip/address')->add(
                    $address->extractVariables('array', true)
                );
                $result = [
                    'id'=> 201,
                    'message' => 'address created!'
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

    public static function updateAddress($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/address/set',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'address update!'
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

    public static function removeAddress($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/ip/address/remove',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'address removed!'
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

    public static function enableAddress($data){
        try{
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/address/enable',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'Address enabled!'
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

    public static function disableAddress($data){
        try{
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/address/disable',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'Address disabled!'
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
}