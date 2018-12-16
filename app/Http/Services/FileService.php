<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 23/03/2018
 * Time: 18:03
 */

namespace App\Http\Services;


use App\Http\Model\FileMikrotik;
use App\Http\Model\ProfilePPP;
use App\Http\Util\MESSAGE;
use App\Http\Util\MikrotikUtil;

class FileService extends Services
{
    public static function getFiles(){
        $data = array();
        $data['files'] = array();

        try {
            $filesMikrotik = MikrotikUtil::Util()->setMenu('/file')->getAll();

            foreach ($filesMikrotik as $result) {
                $fileMikrotik = new FileMikrotik();
                $fileMikrotik->create($result->getIterator(), 'API');
                array_push($data['files'], $fileMikrotik->extractVariables('object'));
            }
            $result = [
                'id'=> 201,
                'message' => MESSAGE::SUCCESS,
                'result' => $data['files']
            ];
        } catch (Exception $e) {
            $result = [
                'id'=> 400,
                'message' => $e->getMessage()
            ];
        }

        return $result;
    }

    public static function sendFile($data){
        $profile = new ProfilePPP();

        try {
            if (!empty($data)) {
                $profile->create($data);

                MikrotikUtil::send_file(
                    $data['source'],
                    $data['destination']
                );
                $result = [
                    'id'=> 201,
                    'message' => MESSAGE::CREATED
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

    public static function removeFile($data){

        try {
            if (!empty($data)) {
                MikrotikUtil::remove_register(
                    '/file/remove',
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