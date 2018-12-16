<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class OvpnServerTest extends TestCase
{
    public function test_get_ovpns_server()
    {
        $result = Services\OvpnServerService::getOvpns();

        //valid ovpn
        $this->assertEquals(201, $result['id']);
    }

    public function desat_test_create_ovpn_server()
    {
        //Test of route
        $this->get('/interface/ovpn-server/add')->assertStatus(200);

        //data ovpn
        $POST = array(
            'name' => 'Ovpn_teste'
        );

        //ovpn update
        $result = Services\OvpnServerService::addOvpns($POST);

        //valid ovpn
        $this->assertEquals(201, $result['id']);
    }

    public function desat_test_update_ovpn_server()
    {
        //Test of route
        $this->get('/interface/ovpn-server/update')->assertStatus(200);

        //data ovpn
        $POST = array(
            'index' => Services\OvpnServerService::existsReg(
                '/interface/ovpn-server/print',
                ['name','Ovpn_teste']
            ),
            'name' => 'Ovpn_teste_update'
        );

        //ovpn update
        $result = Services\OvpnServerService::updateOvpn($POST);

        //valid ovpn
        $this->assertEquals(201, $result['id']);
    }

    public function desat_test_remove_ovpn_server()
    {
        //Test of route
        $this->get('/interface/ovpn-server/remove')->assertStatus(200);

        //data ovpn
        $POST = array(
            'index' => Services\OvpnServerService::existsReg(
                '/interface/ovpn-server/print',
                ['name','Ovpn_teste_update']
            )
        );

        //ovpn remove
        $result = Services\OvpnServerService::removeOvpn($POST);

        //valid ovpn
        $this->assertEquals(201, $result['id']);
    }
}