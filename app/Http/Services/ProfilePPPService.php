<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 23/03/2018
 * Time: 18:03
 */

namespace App\Http\Services;


use App\Http\Model\ProfilePPP;
use App\Http\Util\MESSAGE;
use App\Http\Util\MikrotikUtil;

class ProfilePPPService extends Services
{
    public static function getProfiles(){
        $data = array();
        $data['profiles'] = array();

        try {
            $profiles = MikrotikUtil::Util()->setMenu('/ppp/profile')->getAll();
            foreach ($profiles as $result) {
                $profile = new ProfilePPP();
                $profile->create($result->getIterator(), 'API');
                array_push($data['profiles'], $profile->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => MESSAGE::SUCCESS,
                'result' => $data['profiles']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function addProfile($data){
        $profile = new ProfilePPP();

        try {
            if (!empty($data)) {
                $profile->create($data);

                MikrotikUtil::Util()->setMenu("/ppp/profile")->add(
                    $profile->extractVariables('array', true)
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

    public static function updateProfile($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ppp/profile/set',
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

    public static function removeProfile($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/ppp/profile/remove',
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