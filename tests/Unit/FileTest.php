<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class FileTest extends TestCase
{
    public function test_get_files()
    {
        $result = Services\FileService::getFiles();

        //valid profile
        $this->assertEquals(201, $result['id']);
    }

    public function test_send_file()
    {
        //Test of route
        $this->get('/files/send')->assertStatus(200);

        //data file
        $POST = array(
            'source' => 'C:\wamp64\www\laravel\mikrotik\public\repo_files\file_test.txt',
            'destination' => 'file_test.txt'
        );

        //file update
        $result = Services\FileService::sendFile($POST);

        //valid file
        $this->assertEquals(201, $result['id']);
    }

    public function test_remove_file()
    {
        //Test of route
        $this->get('/files/remove')->assertStatus(200);

        //data file
        $POST = array(
            'index' => Services\FileService::existsReg(
                '/file/print',
                ['name','file_test.txt']
            )
        );

        //file update
        $result = Services\FileService::removeFile($POST);

        //valid file
        $this->assertEquals(201, $result['id']);
    }
}