<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 15/03/2018
 * Time: 17:48
 */

namespace App\Http\Services;

use App\Http\Model\OvpnServer;
use App\Http\Model\Profile;
use App\Http\Model\User;
use App\Http\Util\MESSAGE;
use App\Http\Util\MikrotikUtil;

class OvpnServerService extends Services
{
    public static function getOvpns(){
        $data = array();
        $data['ovpns'] = array();

        try {
            $profiles = MikrotikUtil::Util()->setMenu('/interface/ovpn-server')->getAll();
            foreach ($profiles as $result) {
                $ovpn = new OvpnServer();
                $ovpn->create($result->getIterator(), 'API');
                array_push($data['ovpns'], $ovpn->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => MESSAGE::SUCCESS,
                'result' => $data['ovpns']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function addOvpns($data){
        $ovpn = new OvpnServer();

        try {
            if (!empty($data)) {
                $ovpn->create($data);

                MikrotikUtil::Util()->setMenu("/interface/ovpn-server")->add(
                    $ovpn->extractVariables('array', true)
                );
            }
            $result = [
                'id'=> 201,
                'message' => MESSAGE::CREATED
            ];
        }catch (RouterErrorException $e){
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;

    }

    public static function updateOvpn($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/interface/ovpn-server/set',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => MESSAGE::UPDATED
                ];
            }else{
                $result = [
                    'id'=> 400,
                    'message' => MESSAGE::DATA_NOT_SEND
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

    public static function removeOvpn($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/interface/ovpn-server/remove',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => MESSAGE::REMOVED
                ];
            }else{
                $result = [
                    'id'=> 400,
                    'message' => MESSAGE::DATA_NOT_SEND
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