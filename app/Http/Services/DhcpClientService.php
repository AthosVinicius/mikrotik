<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 21/03/2018
 * Time: 16:02
 */

namespace App\Http\Services;


use App\Http\Model\Dhcp;
use App\Http\Model\DhcpClient;
use App\Http\Util\MikrotikUtil;

class DhcpClientService extends Services
{
    public static function getDhcps(){
        $data = array();
        $data['dhcps'] = array();

        try {
            $dhcps = MikrotikUtil::Util()->setMenu('/ip/dhcp-client')->getAll();
            foreach ($dhcps as $result) {
                $dhcp = new DhcpClient();
                $dhcp->create($result->getIterator(), 'API');

                array_push($data['dhcps'], $dhcp->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => 'Address loaded!',
                'result' => $data['dhcps']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function addDhcp($data){
        try{
            $dhcp = new DhcpClient();

            if(!empty($data)) {
                $dhcp->create($data);

                MikrotikUtil::Util()->setMenu('/ip/dhcp-client')->add(
                    $dhcp->extractVariables('array', true)
                );
                $result = [
                    'id'=> 201,
                    'message' => 'dhcp created!'
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

    public static function enableDhcp($data){
        try{
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/dhcp-client/enable',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'Dhcp enabled!'
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

    public static function disableDhcp($data){

        try{
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/dhcp-client/disable',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'Dhcp disabled!'
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

    public static function updateDhcp($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/dhcp-client/set',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'dhcp update!'
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

    public static function removeDhcp($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/ip/dhcp-client/remove',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'dhcp removed!'
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