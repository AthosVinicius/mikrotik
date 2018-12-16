<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class DhcpsTest extends TestCase
{
    public function test_get_dhcps()
    {
        $result = Services\DhcpService::getDhcps();

        //valid users
        $this->assertEquals(201, $result['id']);
    }

    public function test_create_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/add')->assertStatus(200);

        //data dhcp
        $POST = array(
            'name' => 'Dhcp_teste',
            'interface' => 'ether2',
            'leasetime' => '00:10:00',
            'address-pool' => 'static-only',
            'authoritative' => 'yes',
            'bootp-support' => 'static',
            'user-radius' => 'no'
        );

        //dhcp add
        $result = Services\DhcpService::addDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/update')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpService::existsReg('/ip/dhcp-server/print', ['name','Dhcp_teste']),
            'name' => 'Dhcp_teste_update'
        );

        //dhcp update
        $result = Services\DhcpService::updateDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_enable_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/enable')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpService::existsReg('/ip/dhcp-server/print',['name','Dhcp_teste_update'])
        );

        //dhcp remove
        $result = Services\DhcpService::enableDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_disable_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/disable')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpService::existsReg('/ip/dhcp-server/print',['name','Dhcp_teste_update'])
        );

        //dhcp remove
        $result = Services\DhcpService::disableDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }

    public function test_remove_dhcp()
    {
        //Test of route
        $this->get('/ip/dhcps/remove')->assertStatus(200);

        //data dhcp
        $POST = array(
            'index' => Services\DhcpService::existsReg('/ip/dhcp-server/print',['name','Dhcp_teste_update'])
        );

        //dhcp remove
        $result = Services\DhcpService::removeDhcp($POST);

        //valid dhcp
        $this->assertEquals(201, $result['id']);
    }
}