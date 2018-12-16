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

class InterfaceMikrotik extends Model{

    protected  $id;
    protected  $name;
    protected  $default_name;
    protected  $type;
    protected  $mtu;
    protected  $actual_mtu;
    protected  $mac_address;
    protected  $last_link_up_time;
    protected  $link_downs;
    protected  $rx_byte;
    protected  $tx_byte;
    protected  $rx_packet;
    protected  $tx_packet;
    protected  $rx_drop;
    protected  $tx_drop;
    protected  $tx_queue_drop;
    protected  $rx_error;
    protected  $fp_rx_byte;
    protected  $fp_tx_byte;
    protected  $running;
    protected  $disabled;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);
        if($this->exists_var($data,'name'))
            $this->setName($data['name']);
        if($this->exists_var($data,'default_name'))
            $this->setDefaultName($data['default_name']);
        if($this->exists_var($data,'type'))
            $this->setType($data['type']);
        if($this->exists_var($data,'mtu'))
            $this->setMtu($data['mtu']);
        if($this->exists_var($data,'actual_mtu'))
            $this->setActualMtu($data['actual_mtu']);
        if($this->exists_var($data,'mac_address'))
            $this->setMacAddress($data['mac_address']);
        if($this->exists_var($data,'last_link_up_time'))
            $this->setLastLinkUpTime($data['last_link_up_time']);
        if($this->exists_var($data,'link_downs'))
            $this->setLinkDowns($data['link_downs']);
        if($this->exists_var($data,'rx_byte'))
            $this->setRxByte($data['rx_byte']);
        if($this->exists_var($data,'tx_byte'))
            $this->setTxByte($data['tx_byte']);
        if($this->exists_var($data,'rx_packet'))
            $this->setRxPacket($data['rx_packet']);
        if($this->exists_var($data,'tx_packet'))
            $this->setTxPacket($data['tx_packet']);
        if($this->exists_var($data,'rx_drop'))
            $this->setRxDrop($data['rx_drop']);
        if($this->exists_var($data,'tx_drop'))
            $this->setTxDrop($data['tx_drop']);
        if($this->exists_var($data,'tx_queue_drop'))
            $this->setTxQueueDrop($data['tx_queue_drop']);
        if($this->exists_var($data,'rx_error'))
            $this->setRxError($data['rx_error']);
        if($this->exists_var($data,'fp_rx_byte'))
            $this->setFpRxByte($data['fp_rx_byte']);
        if($this->exists_var($data,'fp_tx_byte'))
            $this->setFpTxByte($data['fp_tx_byte']);
        if($this->exists_var($data,'running'))
            $this->setRunning($data['running']);
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
    public function getDefaultName()
    {
        return $this->default_name;
    }

    /**
     * @param mixed $default_name
     */
    public function setDefaultName($default_name)
    {
        $this->default_name = Validator::is_empty_null($default_name);
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = Validator::is_empty_null($type);
    }

    /**
     * @return mixed
     */
    public function getMtu()
    {
        return $this->mtu;
    }

    /**
     * @param mixed $mtu
     */
    public function setMtu($mtu)
    {
        $this->mtu = Validator::is_empty_null($mtu);
    }

    /**
     * @return mixed
     */
    public function getActualMtu()
    {
        return $this->actual_mtu;
    }

    /**
     * @param mixed $actual_mtu
     */
    public function setActualMtu($actual_mtu)
    {
        $this->actual_mtu = Validator::is_empty_null($actual_mtu);
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
        $this->mac_address = Validator::is_empty_null($mac_address);
    }

    /**
     * @return mixed
     */
    public function getLastLinkUpTime()
    {
        return $this->last_link_up_time;
    }

    /**
     * @param mixed $last_link_up_time
     */
    public function setLastLinkUpTime($last_link_up_time)
    {
        $this->last_link_up_time = Validator::is_empty_null($last_link_up_time);
    }

    /**
     * @return mixed
     */
    public function getLinkDowns()
    {
        return $this->link_downs;
    }

    /**
     * @param mixed $link_downs
     */
    public function setLinkDowns($link_downs)
    {
        $this->link_downs = Validator::is_empty_null($link_downs);
    }

    /**
     * @return mixed
     */
    public function getRxByte()
    {
        return $this->rx_byte;
    }

    /**
     * @param mixed $rx_byte
     */
    public function setRxByte($rx_byte)
    {
        $this->rx_byte = Validator::is_empty_null($rx_byte);
    }

    /**
     * @return mixed
     */
    public function getTxByte()
    {
        return $this->tx_byte;
    }

    /**
     * @param mixed $tx_byte
     */
    public function setTxByte($tx_byte)
    {
        $this->tx_byte = Validator::is_empty_null($tx_byte);
    }

    /**
     * @return mixed
     */
    public function getRxPacket()
    {
        return $this->rx_packet;
    }

    /**
     * @param mixed $rx_packet
     */
    public function setRxPacket($rx_packet)
    {
        $this->rx_packet = Validator::is_empty_null($rx_packet);
    }

    /**
     * @return mixed
     */
    public function getTxPacket()
    {
        return $this->tx_packet;
    }

    /**
     * @param mixed $tx_packet
     */
    public function setTxPacket($tx_packet)
    {
        $this->tx_packet = Validator::is_empty_null($tx_packet);
    }

    /**
     * @return mixed
     */
    public function getRxDrop()
    {
        return $this->rx_drop;
    }

    /**
     * @param mixed $rx_drop
     */
    public function setRxDrop($rx_drop)
    {
        $this->rx_drop = Validator::is_empty_null($rx_drop);
    }

    /**
     * @return mixed
     */
    public function getTxDrop()
    {
        return $this->tx_drop;
    }

    /**
     * @param mixed $tx_drop
     */
    public function setTxDrop($tx_drop)
    {
        $this->tx_drop = Validator::is_empty_null($tx_drop);
    }

    /**
     * @return mixed
     */
    public function getTxQueueDrop()
    {
        return $this->tx_queue_drop;
    }

    /**
     * @param mixed $tx_queue_drop
     */
    public function setTxQueueDrop($tx_queue_drop)
    {
        $this->tx_queue_drop = Validator::is_empty_null($tx_queue_drop);
    }

    /**
     * @return mixed
     */
    public function getRxError()
    {
        return $this->rx_error;
    }

    /**
     * @param mixed $rx_error
     */
    public function setRxError($rx_error)
    {
        $this->rx_error = Validator::is_empty_null($rx_error);
    }

    /**
     * @return mixed
     */
    public function getFpRxByte()
    {
        return $this->fp_rx_byte;
    }

    /**
     * @param mixed $fp_rx_byte
     */
    public function setFpRxByte($fp_rx_byte)
    {
        $this->fp_rx_byte = Validator::is_empty_null($fp_rx_byte);
    }

    /**
     * @return mixed
     */
    public function getFpTxByte()
    {
        return $this->fp_tx_byte;
    }

    /**
     * @param mixed $fp_tx_byte
     */
    public function setFpTxByte($fp_tx_byte)
    {
        $this->fp_tx_byte = Validator::is_empty_null($fp_tx_byte);
    }

    /**
     * @return mixed
     */
    public function getRunning()
    {
        return $this->running;
    }

    /**
     * @param mixed $running
     */
    public function setRunning($running)
    {
        $this->running = Validator::is_empty_null($running);
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