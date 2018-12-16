<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 21/03/2018
 * Time: 12:21
 */

use \App\Http\Services;
use \Tests\TestCase;

class AddressTest extends TestCase
{
    public function test_get_address()
    {
        $result = Services\AddressService::getAddress();

        //valid address
        $this->assertEquals(201, $result['id']);
    }
    public function atest_create_address()
    {
        //Test of route
        $this->get('/ip/address/add')->assertStatus(200);

        //data address
        $POST = array(
            'name' => 'Addres_teste',
            'address' => '172.16.200.130',
            'netmask' => '255.255.255.0',
            'interface' => 'ether1'
        );

        //user add
        $result = Services\AddressService::addAddress($POST);

        //valid address
        $this->assertEquals(201, $result['id']);
    }
}