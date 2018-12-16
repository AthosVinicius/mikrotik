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

class Address extends Model{

    protected  $id;
    protected  $address;
    protected  $network;
    protected  $interface;
    protected  $actual_interface;
    protected  $invalid;
    protected  $dynamic;
    protected  $disabled;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);
        if($this->exists_var($data,'address'))
            $this->setAddress($data['address']);
        if($this->exists_var($data,'network'))
            $this->setNetwork($data['network']);
        if($this->exists_var($data,'interface'))
            $this->setInterface($data['interface']);
        if($this->exists_var($data,'actual_interface'))
            $this->setActualInterface($data['actual_interface']);
        if($this->exists_var($data,'invalid'))
            $this->setInvalid($data['invalid']);
        if($this->exists_var($data,'dynamic'))
            $this->setDynamic($data['dynamic']);
        if($this->exists_var($data,'disabled'))
            $this->setDisabled($data['disabled']);
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
        $this->id = Validator::is_empty_null($id);
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = Validator::is_empty_null($address);
    }

    /**
     * @return mixed
     */
    public function getNetwork()
    {
        return $this->network;
    }

    /**
     * @param mixed $network
     */
    public function setNetwork($network)
    {
        $this->network = Validator::is_empty_null($network);
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
        $this->interface = Validator::is_empty_null($interface);
    }

    /**
     * @return mixed
     */
    public function getActualInterface()
    {
        return $this->actual_interface;
    }

    /**
     * @param mixed $actual_interface
     */
    public function setActualInterface($actual_interface)
    {
        $this->actual_interface = Validator::is_empty_null($actual_interface);
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
        $this->invalid = Validator::is_empty_null($invalid);
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
        $this->dynamic = Validator::is_empty_null($dynamic);
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
        $this->disabled = Validator::is_empty_null($disabled);
    }

}