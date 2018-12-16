<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 14/03/2018
 * Time: 16:45
 */

use \App\Http\Services;
use \Tests\TestCase;

class ProfilePPPTest extends TestCase
{
    public function test_get_profiles()
    {
        $result = Services\ProfilePPPService::getProfiles();

        //valid profile
        $this->assertEquals(201, $result['id']);
    }

    public function test_create_profile()
    {
        //Test of route
        $this->get('/ppp/profiles/add')->assertStatus(200);

        //data profile
        $POST = array(
            'name' => 'Profile_teste'
        );

        //profile update
        $result = Services\ProfilePPPService::addProfile($POST);

        //valid profile
        $this->assertEquals(201, $result['id']);
    }

    public function test_update_profile()
    {
        //Test of route
        $this->get('/ppp/profiles/update')->assertStatus(200);

        //data profile
        $POST = array(
            'index' => Services\ProfilePPPService::existsReg(
                '/ppp/profile/print',
                ['name','Profile_teste']
            ),
            'name' => 'Profile_teste_update'
        );

        //profile update
        $result = Services\ProfilePPPService::updateProfile($POST);

        //valid profile
        $this->assertEquals(201, $result['id']);
    }

    public function test_remove_profile()
    {
        //Test of route
        $this->get('/ppp/profiles/remove')->assertStatus(200);

        //data profile
        $POST = array(
            'index' => Services\ProfilePPPService::existsReg(
                '/ppp/profile/print',
                ['name','Profile_teste_update']
            )
        );

        //profile remove
        $result = Services\ProfilePPPService::removeProfile($POST);

        //valid profile
        $this->assertEquals(201, $result['id']);
    }
}