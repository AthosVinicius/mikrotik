<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 15/03/2018
 * Time: 17:48
 */

namespace App\Http\Services;

use App\Http\Model\Profile;
use App\Http\Model\User;
use App\Http\Util\MikrotikUtil;

class ServersService extends Services
{
    public static function getProfiles(){
        $data = array();
        $data['profiles'] = array();

        try {
            $profiles = MikrotikUtil::Util()->setMenu('/ip/hotspot/profile')->getAll();
            foreach ($profiles as $result) {
                $profile = new Profile();
                $profile->create($result->getIterator(), 'API');
                array_push($data['profiles'], $profile->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => 'Profiles loaded!',
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
        $profile = new Profile();

        try {
            if (!empty($data)) {
                $profile->create($data);

                MikrotikUtil::Util()->setMenu("/ip/hotspot/profile")->add(
                    $profile->extractVariables('array', true)
                );
            }
            $result = [
                'id'=> 201,
                'message' => 'profile created!'
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
                    '/ip/hotspot/profile/set',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'profile update!'
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

    public static function removeProfile($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/ip/hotspot/profile/remove',
                    $data
                );
                $result = [
                    'id'=> 201,
                    'message' => 'profile removed!'
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