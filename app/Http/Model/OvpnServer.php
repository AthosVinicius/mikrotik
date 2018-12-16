<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 06/03/2018
 * Time: 17:19
 */
namespace App\Http\Model;

use App\Http\Controllers\Validator;
use Illuminate\Database\Eloquent\Model;

class OvpnServer extends \Model{

    protected  $id;
    protected  $auth;
    protected  $certificate;
    protected  $cipher;
    protected  $default_profile;
    protected  $enabled;
    protected  $keepalive_timeout;
    protected  $mac_address;
    protected  $max_mtu;
    protected  $mode;
    protected  $netmask;
    protected  $port;
    protected  $require_client_certificate;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);
        if($this->exists_var($data,'auth'))
            $this->setAuth($data['auth']);
        if($this->exists_var($data,'certificate'))
            $this->setCertificate($data['certificate']);
        if($this->exists_var($data,'cipher'))
            $this->setCipher($data['cipher']);
        if($this->exists_var($data,'default_profile'))
            $this->setDefaultProfile($data['default_profile']);
        if($this->exists_var($data,'enabled'))
            $this->setEnabled($data['enabled']);
        if($this->exists_var($data,'keepalive_timeout'))
            $this->setKeepaliveTimeout($data['keepalive_timeout']);
        if($this->exists_var($data,'mac_address'))
            $this->setMacAddress($data['mac_address']);
        if($this->exists_var($data,'max_mtu'))
            $this->setMaxMtu($data['max_mtu']);
        if($this->exists_var($data,'mode'))
            $this->setMode($data['mode']);
        if($this->exists_var($data,'netmask'))
            $this->setNetmask($data['netmask']);
        if($this->exists_var($data,'port'))
            $this->setPort($data['port']);
        if($this->exists_var($data,'require_client_certificate'))
            $this->setRequireClientCertificate($data['require_client_certificate']);
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
    public function getAuth()
    {
        return $this->auth;
    }

    /**
     * @param mixed $auth
     */
    public function setAuth($auth)
    {
        $this->auth = $auth;
    }

    /**
     * @return mixed
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * @param mixed $certificate
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * @return mixed
     */
    public function getCipher()
    {
        return $this->cipher;
    }

    /**
     * @param mixed $cipher
     */
    public function setCipher($cipher)
    {
        $this->cipher = $cipher;
    }

    /**
     * @return mixed
     */
    public function getDefaultProfile()
    {
        return $this->default_profile;
    }

    /**
     * @param mixed $default_profile
     */
    public function setDefaultProfile($default_profile)
    {
        $this->default_profile = $default_profile;
    }

    /**
     * @return mixed
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
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
        $this->keepalive_timeout = $keepalive_timeout;
    }

    /**
     * @return mixed
     */
    public function getMacAddress()
    {
        return $this->mac_address;
    }

    /**
     * @param mixed $mac_address
     */
    public function setMacAddress($mac_address)
    {
        $this->mac_address = $mac_address;
    }

    /**
     * @return mixed
     */
    public function getMaxMtu()
    {
        return $this->max_mtu;
    }

    /**
     * @param mixed $max_mtu
     */
    public function setMaxMtu($max_mtu)
    {
        $this->max_mtu = $max_mtu;
    }

    /**
     * @return mixed
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param mixed $mode
     */
    public function setMode($mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return mixed
     */
    public function getNetmask()
    {
        return $this->netmask;
    }

    /**
     * @param mixed $netmask
     */
    public function setNetmask($netmask)
    {
        $this->netmask = $netmask;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getRequireClientCertificate()
    {
        return $this->require_client_certificate;
    }

    /**
     * @param mixed $require_client_certificate
     */
    public function setRequireClientCertificate($require_client_certificate)
    {
        $this->require_client_certificate = $require_client_certificate;
    }

}