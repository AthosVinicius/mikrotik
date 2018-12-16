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

class User extends Model{

    protected  $id;
    protected  $address;
    protected  $comment;
    protected  $email ;
    protected  $limit_bytes_in;
    protected  $limit_bytes_out ;
    protected  $limit_bytes_total;
    protected  $limit_uptime;
    protected  $mac_address;
    protected  $name;
    protected  $password;
    protected  $profile;
    protected  $routes;
    protected  $server;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);
        if($this->exists_var($data,'address'))
            $this->setAddress($data['address']);
        if($this->exists_var($data,'comment'))
            $this->setComment($data['comment']);
        if($this->exists_var($data,'email'))
            $this->setEmail($data['email']);
        if($this->exists_var($data,'limitBytesIn'))
            $this->setLimitBytesIn($data['limitBytesIn']);
        if($this->exists_var($data,'limitBytesOut'))
            $this->setLimitBytesOut($data['limitBytesOut']);
        if($this->exists_var($data,'limitBytesTotal'))
            $this->setLimitBytesTotal($data['limitBytesTotal']);
        if($this->exists_var($data,'limitUptime'))
            $this->setLimitUptime($data['limitUptime']);
        if($this->exists_var($data,'macAddress'))
            $this->setMacAddress($data['macAddress']);
        if($this->exists_var($data,'name'))
            $this->setName($data['name']);
        if($this->exists_var($data,'password'))
            $this->setPassword($data['password']);
        if($this->exists_var($data,'profile'))
            $this->setProfile($data['profile']);
        if($this->exists_var($data,'routes'))
            $this->setRoutes($data['routes']);
        if($this->exists_var($data,'server'))
            $this->setServer($data['server']);
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
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = Validator::is_empty_null($comment);
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = Validator::is_empty_null($email);
    }

    /**
     * @return mixed
     */
    public function getLimitBytesIn()
    {
        return $this->limit_bytes_in;
    }

    /**
     * @param mixed $limitBytesIn
     */
    public function setLimitBytesIn($limitBytesIn)
    {
        $this->limit_bytes_in = Validator::is_empty_null($limitBytesIn);
    }

    /**
     * @return mixed
     */
    public function getLimitBytesOut()
    {
        return $this->limit_bytes_out;
    }

    /**
     * @param mixed $limitBytesOut
     */
    public function setLimitBytesOut($limitBytesOut)
    {
        $this->limit_bytes_out = Validator::is_empty_null($limitBytesOut);
    }

    /**
     * @return mixed
     */
    public function getLimitBytesTotal()
    {
        return $this->limit_bytes_total;
    }

    /**
     * @param mixed $limitBytesTotal
     */
    public function setLimitBytesTotal($limitBytesTotal)
    {
        $this->limit_bytes_total = Validator::is_empty_null($limitBytesTotal);
    }

    /**
     * @return mixed
     */
    public function getLimitUptime()
    {
        return $this->limit_uptime;
    }

    /**
     * @param mixed $limitUptime
     */
    public function setLimitUptime($limitUptime)
    {
        $this->limit_uptime = Validator::is_empty_null($limitUptime);
    }

    /**
     * @return mixed
     */
    public function getMacAddress()
    {
        return $this->mac_address;
    }

    /**
     * @param mixed $macAddress
     */
    public function setMacAddress($macAddress)
    {
        $this->mac_address = Validator::is_empty_null($macAddress);
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
        $this->name = Validator::is_empty_null($name);
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = Validator::is_empty_null($password);
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = Validator::is_empty_null($profile);
    }

    /**
     * @return mixed
     */
    public function getRoutes()
    {
        return $this->routes;
    }

    /**
     * @param mixed $routes
     */
    public function setRoutes($routes)
    {
        $this->routes = Validator::is_empty_null($routes);
    }

    /**
     * @return mixed
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param mixed $server
     */
    public function setServer($server)
    {
        $this->server = Validator::is_empty_null($server);
    }


}