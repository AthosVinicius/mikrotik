<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class InterfacesMikrotikTest extends TestCase
{
    public function test_get_interfaces()
    {
        //Test of route
        $this->get('/interfaces/update')->assertStatus(200);

        $result = Services\InterfacesMikrotikService::getInterface();

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_interface()
    {
        //Test of route
        $this->get('/interfaces/update')->assertStatus(200);

        //data interface
        $POST = array(
            'index' => Services\InterfacesMikrotikService::existsInterface(['name','ether2']),
            'name' => 'ether5'
        );

        //interface update
        $result = Services\InterfacesMikrotikService::updateInterface($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_reverse_interface()
    {
        //Test of route
        $this->get('/interfaces/update')->assertStatus(200);

        //data interface
        $POST = array(
            'index' => Services\InterfacesMikrotikService::existsInterface(['name','ether5']),
            'name' => 'ether2'
        );

        //interface update
        $result = Services\InterfacesMikrotikService::updateInterface($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_disable_interface()
    {
        //Test of route
        $this->get('/interfaces/disable')->assertStatus(200);

        //data user
        $POST = array(
            'index' => Services\InterfacesMikrotikService::existsInterface(['name','ether2'])
        );

        //user remove
        $result = Services\InterfacesMikrotikService::disableInterface($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_enable_interface()
    {
        //Test of route
        $this->get('/interfaces/enable')->assertStatus(200);

        //data user
        $POST = array(
            'index' => Services\InterfacesMikrotikService::existsInterface(['name','ether2'])
        );

        //user remove
        $result = Services\InterfacesMikrotikService::enableInterface($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

}