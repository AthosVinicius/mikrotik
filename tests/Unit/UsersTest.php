<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class UsersTest extends TestCase
{
    public function test_get_users()
    {
        $result = Services\UsersService::getUsers();

        //valid users
        $this->assertEquals(201, $result['id']);
    }

    public function test_create_user()
    {
        //Test of route
        $this->get('/ip/hotspot/users/add')->assertStatus(200);

        //data user
        $POST = array(
            'name' => 'User_teste'
        );

        //user add
        $result = Services\UsersService::addUser($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_user()
    {
        //Test of route
        $this->get('/ip/hotspot/users/update')->assertStatus(200);

        //data user
        $POST = array(
            'index' => Services\UsersService::existsReg(
                '/ip/hotspot/user/print',
                ['name','User_teste']
            ),
            'name' => 'User_teste_update'
        );

        //user update
        $result = Services\UsersService::updateUser($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_remove_user()
    {
        //Test of route
        $this->get('/ip/hotspot/users/remove')->assertStatus(200);

        //data user
        $POST = array(
            'index' => Services\UsersService::existsUser(['name','User_teste_update'])
        );

        //user remove
        $result = Services\UsersService::removeUser($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_get_profiles()
    {
        $result = Services\UsersService::getProfiles();

        //valid profiles
        $this->assertEquals(201, $result['id']);
    }

    public function test_create_profile()
    {
        //Test of route
        $this->get('/users/addProfile')->assertStatus(200);

        //data profile
        $POST = array(
            'name' => 'Profile_teste'
        );

        //profile add
        $result = Services\UsersService::addProfile($POST);

        //valid profile
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_profile()
    {
        //Test of route
        $this->get('/users/updateProfile')->assertStatus(200);

        //data user
        $POST = array(
            'index' => Services\UsersService::existsProfile(['name','Profile_teste']),
            'name' => 'Profile_teste_update'
        );

        //user update
        $result = Services\UsersService::updateProfile($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

    public function test_remove_profile()
    {
        //Test of route
        $this->get('/users/removeProfile')->assertStatus(200);

        //data user
        $POST = array(
            'index' => Services\UsersService::existsProfile(['name','Profile_teste_update'])
        );

        //user remove
        $result = Services\UsersService::removeProfile($POST);

        //valid user
        $this->assertEquals(201, $result['id']);
    }

}