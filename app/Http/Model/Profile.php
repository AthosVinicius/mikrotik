<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 06/03/2018
 * Time: 17:52
 */
namespace App\Http\Model;

use App\Http\Controllers\Validator;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model{

    protected $id;
    protected $add_mac_cookie;
    protected $address_list;
    protected $address_pool;
    protected $advertise;
    protected $advertise_interval;
    protected $advertise_timeout;
    protected $advertise_url;
    protected $idle_timeout;
    protected $incoming_filter;
    protected $incoming_packet_mark;
    protected $keepalive_timeout;
    protected $mac_cookie_timeout;
    protected $name;
    protected $on_login;
    protected $on_logout;
    protected $open_status_page;
    protected $outgoing_filter;
    protected $outgoing_packet_mark;
    protected $rate_limit;
    protected $session_timeout;
    protected $shared_users;
    protected $status_autorefresh;
    protected $transparent_proxy;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);

        if($this->exists_var($data,'add_mac_cookie'))
            $this->setAddMacCookie($data['add_mac_cookie']);

        if($this->exists_var($data,'address_list'))
            $this->setAddressList($data['address_list']);


        if($this->exists_var($data,'address_pool'))
            $this->setAddressPool($data['address_pool']);

        if($this->exists_var($data,'advertise'))
            $this->setAdvertise($data['advertise']);

        if($this->exists_var($data,'advertise'))
            $this->setAdvertiseInterval($data['advertise']);

        if($this->exists_var($data,'advertise_timeout'))
            $this->setAdvertiseTimeout($data['advertise_timeout']);

        if($this->exists_var($data,'advertise_url'))
            $this->setAdvertiseUrl($data['advertise_url']);

        if($this->exists_var($data,'idle_timeout'))
            $this->setIdleTimeout($data['idle_timeout']);

        if($this->exists_var($data,'incoming_filter'))
            $this->setIncomingFilter($data['incoming_filter']);

        if($this->exists_var($data,'incoming_packet_mark'))
            $this->setIncomingPacketMark($data['incoming_packet_mark']);

        if($this->exists_var($data,'keepalive_timeout'))
            $this->setKeepaliveTimeout($data['keepalive_timeout']);

        if($this->exists_var($data,'mac_cookie_timeout'))
            $this->setMacCookieTimeout($data['mac_cookie_timeout']);

        if($this->exists_var($data,'name'))
            $this->setName($data['name']);

        if($this->exists_var($data,'on_login'))
            $this->setOnLogin($data['on_login']);

        if($this->exists_var($data,'on_logout'))
            $this->setOnLogout($data['on_logout']);

        if($this->exists_var($data,'open_status_page'))
            $this->setOpenStatusPage($data['open_status_page']);

        if($this->exists_var($data,'outgoing_filter'))
            $this->setOutgoingFilter($data['outgoing_filter']);

        if($this->exists_var($data,'outgoing_packet_mark'))
            $this->setOutgoingPacketMark($data['outgoing_packet_mark']);

        if($this->exists_var($data,'rate_limit'))
            $this->setRateLimit($data['rate_limit']);

        if($this->exists_var($data,'session_timeout'))
            $this->setSessionTimeout($data['session_timeout']);

        if($this->exists_var($data,'shared_users'))
            $this->setSharedUsers($data['shared_users']);

        if($this->exists_var($data,'status_autorefresh'))
            $this->setStatusAutorefresh($data['status_autorefresh']);

        if($this->exists_var($data,'transparent_proxy'))
            $this->setTransparentProxy($data['transparent_proxy']);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getAddMacCookie()
    {
        return $this->add_mac_cookie;
    }

    /**
     * @param mixed $add_mac_cookie
     */
    public function setAddMacCookie($add_mac_cookie)
    {
        $this->add_mac_cookie = $this->is_empty_null($add_mac_cookie);
    }

    /**
     * @return mixed
     */
    public function getAddressList()
    {
        return $this->address_list;
    }

    /**
     * @param mixed $address_list
     */
    public function setAddressList($address_list)
    {
        $this->address_list = $this->is_empty_null($address_list);
    }

    /**
     * @return mixed
     */
    public function getAddressPool()
    {
        return $this->address_pool;
    }

    /**
     * @param mixed $address_pool
     */
    public function setAddressPool($address_pool)
    {
        $this->address_pool = $this->is_empty_null($address_pool);
    }

    /**
     * @return mixed
     */
    public function getAdvertise()
    {
        return $this->advertise;
    }

    /**
     * @param mixed $advertise
     */
    public function setAdvertise($advertise)
    {
        $this->advertise = $this->is_empty_null($advertise);
    }

    /**
     * @return mixed
     */
    public function getAdvertiseInterval()
    {
        return $this->advertise_interval;
    }

    /**
     * @param mixed $advertise_interval
     */
    public function setAdvertiseInterval($advertise_interval)
    {
        $this->advertise_interval = $this->is_empty_null($advertise_interval);
    }

    /**
     * @return mixed
     */
    public function getAdvertiseTimeout()
    {
        return $this->advertise_timeout;
    }

    /**
     * @param mixed $advertise_timeout
     */
    public function setAdvertiseTimeout($advertise_timeout)
    {
        $this->advertise_timeout = $this->is_empty_null($advertise_timeout);
    }

    /**
     * @return mixed
     */
    public function getAdvertiseUrl()
    {
        return $this->advertise_url;
    }

    /**
     * @param mixed $advertise_url
     */
    public function setAdvertiseUrl($advertise_url)
    {
        $this->advertise_url = $this->is_empty_null($advertise_url);
    }

    /**
     * @return mixed
     */
    public function getIdleTimeout()
    {
        return $this->idle_timeout;
    }

    /**
     * @param mixed $idle_timeout
     */
    public function setIdleTimeout($idle_timeout)
    {
        $this->idle_timeout = $this->is_empty_null($idle_timeout);
    }

    /**
     * @return mixed
     */
    public function getIncomingFilter()
    {
        return $this->incoming_filter;
    }

    /**
     * @param mixed $incoming_filter
     */
    public function setIncomingFilter($incoming_filter)
    {
        $this->incoming_filter = $this->is_empty_null($incoming_filter);
    }

    /**
     * @return mixed
     */
    public function getIncomingPacketMark()
    {
        return $this->incoming_packet_mark;
    }

    /**
     * @param mixed $incoming_packet_mark
     */
    public function setIncomingPacketMark($incoming_packet_mark)
    {
        $this->incoming_packet_mark = $this->is_empty_null($incoming_packet_mark);
    }

    /**
     * @return mixed
     */
    public function getKeepaliveTimeout()
    {
        return $this->keepalive_timeout;
    }

    /**
     * @param mixed $keepalive_timeout
     */
    public function setKeepaliveTimeout($keepalive_timeout)
    {
        $this->keepalive_timeout = $this->is_empty_null($keepalive_timeout);
    }

    /**
     * @return mixed
     */
    public function getMacCookieTimeout()
    {
        return $this->mac_cookie_timeout;
    }

    /**
     * @param mixed $mac_cookie_timeout
     */
    public function setMacCookieTimeout($mac_cookie_timeout)
    {
        $this->mac_cookie_timeout = $this->is_empty_null($mac_cookie_timeout);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $this->is_empty_null($name);
    }

    /**
     * @return mixed
     */
    public function getOnLogin()
    {
        return $this->on_login;
    }

    /**
     * @param mixed $on_login
     */
    public function setOnLogin($on_login)
    {
        $this->on_login = $this->is_empty_null($on_login);
    }

    /**
     * @return mixed
     */
    public function getOnLogout()
    {
        return $this->on_logout;
    }

    /**
     * @param mixed $on_logout
     */
    public function setOnLogout($on_logout)
    {
        $this->on_logout = $this->is_empty_null($on_logout);
    }

    /**
     * @return mixed
     */
    public function getOpenStatusPage()
    {
        return $this->open_status_page;
    }

    /**
     * @param mixed $open_status_page
     */
    public function setOpenStatusPage($open_status_page)
    {
        $this->open_status_page = $this->is_empty_null($open_status_page);
    }

    /**
     * @return mixed
     */
    public function getOutgoingFilter()
    {
        return $this->outgoing_filter;
    }

    /**
     * @param mixed $outgoing_filter
     */
    public function setOutgoingFilter($outgoing_filter)
    {
        $this->outgoing_filter = $this->is_empty_null($outgoing_filter);
    }

    /**
     * @return mixed
     */
    public function getOutgoingPacketMark()
    {
        return $this->outgoing_packet_mark;
    }

    /**
     * @param mixed $outgoing_packet_mark
     */
    public function setOutgoingPacketMark($outgoing_packet_mark)
    {
        $this->outgoing_packet_mark = $this->is_empty_null($outgoing_packet_mark);
    }

    /**
     * @return mixed
     */
    public function getRateLimit()
    {
        return $this->rate_limit;
    }

    /**
     * @param mixed $rate_limit
     */
    public function setRateLimit($rate_limit)
    {
        $this->rate_limit = $this->is_empty_null($rate_limit);
    }

    /**
     * @return mixed
     */
    public function getSessionTimeout()
    {
        return $this->session_timeout;
    }

    /**
     * @param mixed $session_timeout
     */
    public function setSessionTimeout($session_timeout)
    {
        $this->session_timeout = $this->is_empty_null($session_timeout);
    }

    /**
     * @return mixed
     */
    public function getSharedUsers()
    {
        return $this->shared_users;
    }

    /**
     * @param mixed $shared_users
     */
    public function setSharedUsers($shared_users)
    {
        $this->shared_users = $this->is_empty_null($shared_users);
    }

    /**
     * @return mixed
     */
    public function getStatusAutorefresh()
    {
        return $this->status_autorefresh;
    }

    /**
     * @param mixed $status_autorefresh
     */
    public function setStatusAutorefresh($status_autorefresh)
    {
        $this->status_autorefresh = $this->is_empty_null($status_autorefresh);
    }

    /**
     * @return mixed
     */
    public function getTransparentProxy()
    {
        return $this->transparent_proxy;
    }

    /**
     * @param mixed $transparent_proxy
     */
    public function setTransparentProxy($transparent_proxy)
    {
        $this->transparent_proxy = $this->is_empty_null($transparent_proxy);
    }



}