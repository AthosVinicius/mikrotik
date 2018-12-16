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

class ProfilePPP extends Model{

    protected $id;
    protected $name;
    protected $use_mpls;
    protected $use_compression;
    protected $use_encryption;
    protected $only_one;
    protected $change_tcp_mss;
    protected $use_upnp;
    protected $address_list;
    protected $on_up;
    protected $on_down;
    protected $default;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);

        if($this->exists_var($data,'name'))
            $this->setName($data['name']);

        if($this->exists_var($data,'use_mpls'))
            $this->setUseMpls($data['use_mpls']);


        if($this->exists_var($data,'use_compression'))
            $this->setUseCompression($data['use_compression']);

        if($this->exists_var($data,'use_encryption'))
            $this->setUseEncryption($data['use_encryption']);

        if($this->exists_var($data,'only_one'))
            $this->setOnlyOne($data['only_one']);

        if($this->exists_var($data,'change_tcp_mss'))
            $this->setChangeTcpMss($data['change_tcp_mss']);

        if($this->exists_var($data,'use_upnp'))
            $this->setUseUpnp($data['use_upnp']);

        if($this->exists_var($data,'address_list'))
            $this->setAddressList($data['address_list']);

        if($this->exists_var($data,'on_up'))
            $this->setOnUp($data['on_up']);

        if($this->exists_var($data,'on_down'))
            $this->setOnDown($data['on_down']);

        if($this->exists_var($data,'default'))
            $this->setDefault($data['default']);
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUseMpls()
    {
        return $this->use_mpls;
    }

    /**
     * @param mixed $use_mpls
     */
    public function setUseMpls($use_mpls)
    {
        $this->use_mpls = $use_mpls;
    }

    /**
     * @return mixed
     */
    public function getUseCompression()
    {
        return $this->use_compression;
    }

    /**
     * @param mixed $use_compression
     */
    public function setUseCompression($use_compression)
    {
        $this->use_compression = $use_compression;
    }

    /**
     * @return mixed
     */
    public function getUseEncryption()
    {
        return $this->use_encryption;
    }

    /**
     * @param mixed $use_encryption
     */
    public function setUseEncryption($use_encryption)
    {
        $this->use_encryption = $use_encryption;
    }

    /**
     * @return mixed
     */
    public function getOnlyOne()
    {
        return $this->only_one;
    }

    /**
     * @param mixed $only_one
     */
    public function setOnlyOne($only_one)
    {
        $this->only_one = $only_one;
    }

    /**
     * @return mixed
     */
    public function getChangeTcpMss()
    {
        return $this->change_tcp_mss;
    }

    /**
     * @param mixed $change_tcp_mss
     */
    public function setChangeTcpMss($change_tcp_mss)
    {
        $this->change_tcp_mss = $change_tcp_mss;
    }

    /**
     * @return mixed
     */
    public function getUseUpnp()
    {
        return $this->use_upnp;
    }

    /**
     * @param mixed $use_upnp
     */
    public function setUseUpnp($use_upnp)
    {
        $this->use_upnp = $use_upnp;
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
        $this->address_list = $address_list;
    }

    /**
     * @return mixed
     */
    public function getOnUp()
    {
        return $this->on_up;
    }

    /**
     * @param mixed $on_up
     */
    public function setOnUp($on_up)
    {
        $this->on_up = $on_up;
    }

    /**
     * @return mixed
     */
    public function getOnDown()
    {
        return $this->on_down;
    }

    /**
     * @param mixed $on_down
     */
    public function setOnDown($on_down)
    {
        $this->on_down = $on_down;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     */
    public function setDefault($default)
    {
        $this->default = $default;
    }

}