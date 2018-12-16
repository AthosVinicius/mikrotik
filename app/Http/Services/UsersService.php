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
use App\Http\Util\MESSAGE;
use App\Http\Util\MikrotikUtil;

class UsersService extends Services
{
    public static function existsUser($data){
        $index_user = MikrotikUtil::exists_register("/ip/hotspot/user/print",[$data[0], $data[1]]);
        return $index_user;
    }

    public static function getUsers(){
        $data = array();
        $data['users'] = array();

        try {
            $users = MikrotikUtil::Util()->setMenu('/ip/hotspot/user')->getAll();
            foreach ($users as $result) {
                $user = new User();
                $user->create($result->getIterator(), 'API');
                array_push($data['users'], $user->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => MESSAGE::SUCCESS,
                'result' => $data['users']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function addUser($data){
        $user = new User();

        try {
            if (!empty($data)) {
                $user->create($data);

                MikrotikUtil::Util()->setMenu("/ip hotspot user")->add(
                    $user->extractVariables('array', true)
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

    public static function updateUser($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::update_register(
                    '/ip/hotspot/user/set',
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

    public static function removeUser($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/ip/hotspot/user/remove',
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

    public static function existsProfile($data){
        $index_reg = MikrotikUtil::exists_register("/ip/hotspot/user/profile/print",[$data[0], $data[1]]);
        return $index_reg;
    }

    public static function getProfiles(){
        $data = array();
        $data['profiles'] = array();

        try {
            $profiles = MikrotikUtil::Util()->setMenu('/ip/hotspot/user/profile')->getAll();
            foreach ($profiles as $result) {
                $profile = new Profile();
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
        $profile = new Profile();

        try {
            if (!empty($data)) {
                $profile->create($data);

                MikrotikUtil::Util()->setMenu("/ip hotspot user profile")->add(
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
                    '/ip/hotspot/user/profile/set',
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
                    '/ip/hotspot/user/profile/remove',
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