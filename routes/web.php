<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $app = app();
    $routes = $app->routes->getRoutes();
    return view('routes', compact('routes'));
});

Route::get('/connect', 'MikrotikController@connect');

Route::group(['prefix' => 'logs'], function () {
    Route::get('/', 'LogController@getlog');
});

Route::group(['prefix' => 'ping'], function () {
    Route::any('/', 'PingController@getPing');
});

Route::group(['prefix' => 'users'], function () {
    Route::any('/profiles/', 'UsersController@getProfiles');
    Route::any('/addProfile/', 'UsersController@addProfile');
    Route::any('/updateProfile/', 'UsersController@updateProfile');
    Route::any('/removeProfile/', 'UsersController@removeProfile');
});

Route::group(['prefix' => 'ppp'], function () {
    Route::any('/interface/ovpn-server', 'OvpnServerController@getOvpns');
    Route::any('/interface/ovpn-server/add/', 'OvpnServerController@addOvpn');
    Route::any('/interface/ovpn-server/update/', 'OvpnServerController@updateOvpn');
    Route::any('/interface/ovpn-server/remove/', 'OvpnServerController@removeOvpn');

    Route::any('/profiles', 'ProfilePPPController@getProfiles');
    Route::any('/profiles/add/', 'ProfilePPPController@addProfile');
    Route::any('/profiles/update/', 'ProfilePPPController@updateProfile');
    Route::any('/profiles/remove/', 'ProfilePPPController@removeProfile');

    Route::any('/actives/', 'ActivesPPPController@getActives');
});

Route::group(['prefix' => 'ip'], function(){
    Route::any('/address/','AddressController@getAddress');
    Route::any('/address/disable','AddressController@disableAddress');
    Route::any('/address/enable','AddressController@enableAddress');
    Route::any('/address/add','AddressController@addAddress');
    Route::any('/address/remove','AddressController@removeAddress');
    Route::any('/pool','PoolController@getPool');
    Route::any('/pool/add','PoolController@addPool');
    Route::any('/pool/update','PoolController@updatePool');
    Route::any('/pool/remove','PoolController@removePool');

    Route::any('/hotspot/users/', 'UsersController@getUsers');
    Route::any('/hotspot/users/add/', 'UsersController@addUser');
    Route::any('/hotspot/users/update/', 'UsersController@updateUser');
    Route::any('/hotspot/users/remove/', 'UsersController@removeUser');
    Route::any('/hotspot/profiles/', 'ServersController@getProfiles');
    Route::any('/hotspot/profiles/add/', 'ServersController@addProfile');
    Route::any('/hotspot/profiles/update/', 'ServersController@updateProfile');
    Route::any('/hotspot/profiles/remove/', 'ServersController@removeProfile');

    Route::any('/dhcps/', 'DhcpController@getDhcps');
    Route::any('/dhcps/add', 'DhcpController@addDhcp');
    Route::any('/dhcps/update', 'DhcpController@updateDhcp');
    Route::any('/dhcps/remove', 'DhcpController@removeDhcp');
    Route::any('/dhcps/enable', 'DhcpController@enableDhcp');
    Route::any('/dhcps/disable', 'DhcpController@disableDhcp');

    Route::any('/dhcps/client/', 'DhcpClientController@getDhcps');
    Route::any('/dhcps/client/add', 'DhcpClientController@addDhcp');
    Route::any('/dhcps/client/update', 'DhcpClientController@updateDhcp');
    Route::any('/dhcps/client/remove', 'DhcpClientController@removeDhcp');
    Route::any('/dhcps/client/enable', 'DhcpClientController@enableDhcp');
    Route::any('/dhcps/client/disable', 'DhcpClientController@disableDhcp');
});

Route::group(['prefix' => 'interfaces'], function(){
    Route::any('/','InterfaceMikrotikController@getInterface');
    Route::any('/disable','InterfaceMikrotikController@disabletInterface');
    Route::any('/enable','InterfaceMikrotikController@enabletInterface');
    Route::any('/update','InterfaceMikrotikController@updateInterface');
});

Route::group(['prefix' => 'files'], function(){
    Route::any('/','FilesController@getFiles');
    Route::any('/send','FilesController@sendFile');
    Route::any('/remove','FilesController@removeFile');
});

Route::group(['prefix' => 'servers'], function () {
    Route::any('/profiles/', 'ServersController@getProfiles');
    Route::any('/addProfile/', 'ServersController@addProfile');
});
