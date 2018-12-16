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

class DhcpClient extends Model{

    protected  $id;
    protected  $interface;
    protected  $lease_time;
    protected  $address_pool;
    protected  $bootp_support;
    protected  $authoritative;
    protected  $use_radius;
    protected  $lease_script;
    protected  $dynamic;
    protected  $invalid;
    protected  $disabled;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);
        if($this->exists_var($data,'interface'))
            $this->setInterface($data['interface']);
        if($this->exists_var($data,'lease_time'))
            $this->setLeaseTime($data['lease_time']);
        if($this->exists_var($data,'address_pool'))
            $this->setAddressPool($data['address_pool']);
        if($this->exists_var($data,'bootp_support'))
            $this->setBootpSupport($data['bootp_support']);
        if($this->exists_var($data,'authoritative'))
            $this->setAuthoritative($data['authoritative']);
        if($this->exists_var($data,'use_radius'))
            $this->setUseRadius($data['use_radius']);
        if($this->exists_var($data,'lease_script'))
            $this->setLeaseScript($data['lease_script']);
        if($this->exists_var($data,'dynamic'))
            $this->setDynamic($data['dynamic']);
        if($this->exists_var($data,'invalid'))
            $this->setInvalid($data['invalid']);
        if($this->exists_var($data,'disabled'))
            $this->setDisabled($data['disabled']);
        if($this->exists_var($data,'comment'))
            $this->setDisabled($data['comment']);
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
    public function getInterface()
    {
        return $this->interface;
    }

    /**
     * @param mixed $interface
     */
    public function setInterface($interface)
    {
        $this->interface = $interface;
    }

    /**
     * @return mixed
     */
    public function getLeaseTime()
    {
        return $this->lease_time;
    }

    /**
     * @param mixed $lease_time
     */
    public function setLeaseTime($lease_time)
    {
        $this->lease_time = $lease_time;
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
        $this->address_pool = $address_pool;
    }

    /**
     * @return mixed
     */
    public function getBootpSupport()
    {
        return $this->bootp_support;
    }

    /**
     * @param mixed $bootp_support
     */
    public function setBootpSupport($bootp_support)
    {
        $this->bootp_support = $bootp_support;
    }

    /**
     * @return mixed
     */
    public function getAuthoritative()
    {
        return $this->authoritative;
    }

    /**
     * @param mixed $authoritative
     */
    public function setAuthoritative($authoritative)
    {
        $this->authoritative = $authoritative;
    }

    /**
     * @return mixed
     */
    public function getUseRadius()
    {
        return $this->use_radius;
    }

    /**
     * @param mixed $use_radius
     */
    public function setUseRadius($use_radius)
    {
        $this->use_radius = $use_radius;
    }

    /**
     * @return mixed
     */
    public function getLeaseScript()
    {
        return $this->lease_script;
    }

    /**
     * @param mixed $lease_script
     */
    public function setLeaseScript($lease_script)
    {
        $this->lease_script = $lease_script;
    }

    /**
     * @return mixed
     */
    public function getDynamic()
    {
        return $this->dynamic;
    }

    /**
     * @param mixed $dynamic
     */
    public function setDynamic($dynamic)
    {
        $this->dynamic = $dynamic;
    }

    /**
     * @return mixed
     */
    public function getInvalid()
    {
        return $this->invalid;
    }

    /**
     * @param mixed $invalid
     */
    public function setInvalid($invalid)
    {
        $this->invalid = $invalid;
    }

    /**
     * @return mixed
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param mixed $disabled
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

}