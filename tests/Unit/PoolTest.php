<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class PoolTest extends TestCase
{
    public function test_get_pool()
    {
        $result = Services\InterfacesMikrotikService::getInterface();

        //valid pool
        $this->assertEquals(201, $result['id']);
    }

    public function test_create_pool()
    {
        //Test of route
        $this->get('/ip/pool/add')->assertStatus(200);

        //data pool
        $POST = array(
            'name' => 'pool_teste',
            'ranges' => '0.0.0.1'
        );

        //pool add
        $result = Services\PoolService::addPool($POST);

        //valid pool
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_pool()
    {
        //Test of route
        $this->get('/ip/pool/update')->assertStatus(200);

        //data pool
        $POST = array(
            'index' => Services\PoolService::existsPool(['name','pool_teste']),
            'name' => 'pool_teste_update'
        );

        //pool update
        $result = Services\PoolService::updatePool($POST);

        //valid pool
        $this->assertEquals(201, $result['id']);
    }

    public function test_remove_pool()
    {
        //Test of route
        $this->get('/ip/pool/remove')->assertStatus(200);

        //data pool
        $POST = array(
            'index' => Services\PoolService::existsPool(['name','pool_teste_update'])
        );

        //pool remove
        $result = Services\PoolService::removePool($POST);

        //valid pool
        $this->assertEquals(201, $result['id']);
    }

}