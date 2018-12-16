<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class DhcpsClientTest extends TestCase
{
    public function test_get_dhcps()
    {
        $result = Services\DhcpClientService::getDhcps();

        //valid users
        $this->assertEquals(201, $result['id']);
    }

    public function test_create_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/client/add')->assertStatus(200);

        //data dhcp
        $POST = array(
            'disabled' => 'no',
            'interface' => 'ether1'
        );

        //dhcp add
        $result = Services\DhcpClientService::addDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/client/update')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpClientService::existsReg('/ip/dhcp-client/print', ['interface','ether1']),
            'interface' => 'ether2'
        );

        //dhcp update
        $result = Services\DhcpClientService::updateDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_enable_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/client/enable')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpClientService::existsReg('/ip/dhcp-client/print',['interface','ether1'])
        );

        //dhcp remove
        $result = Services\DhcpClientService::enableDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_disable_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/client/disable')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpClientService::existsReg('/ip/dhcp-client/print',['interface','ether2'])
        );

        //dhcp remove
        $result = Services\DhcpClientService::disableDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_remove_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/client/remove')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpClientService::existsReg('/ip/dhcp-client/print',['interface','ether2'])
        );

        //dhcp remove
        $result = Services\DhcpClientService::removeDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }
}