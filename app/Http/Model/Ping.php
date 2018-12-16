<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 06/03/2018
 * Time: 13:04
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Ping extends Model
{
    protected $seq;
    protected $status;
    protected $sent;
    protected $received;
    protected $packet_loss;
    protected $host;
    protected $size;
    protected $time;

    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'seq'))
            $this->setSeq($data['seq']);
        if($this->exists_var($data,'status'))
            $this->setStatus($data['status']);
        if($this->exists_var($data,'sent'))
            $this->setSent($data['sent']);
        if($this->exists_var($data,'received'))
            $this->setReceived($data['received']);
        if($this->exists_var($data,'packet_loss'))
            $this->setPacketLoss($data['packet_loss']);
        if($this->exists_var($data,'host'))
            $this->setHost($data['host']);
        if($this->exists_var($data,'size'))
            $this->setSize($data['size']);
        if($this->exists_var($data,'time'))
            $this->setTime($data['time']);
    }

    /**
     * @return mixed
     */
    public function getSeq()
    {
        return $this->seq;
    }

    /**
     * @param mixed $seq
     */
    public function setSeq($seq)
    {
        $this->seq = $seq;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param mixed $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getSent()
    {
        return $this->sent;
    }

    /**
     * @param mixed $sent
     */
    public function setSent($sent)
    {
        $this->sent = $sent;
    }

    /**
     * @return mixed
     */
    public function getReceived()
    {
        return $this->received;
    }

    /**
     * @param mixed $received
     */
    public function setReceived($received)
    {
        $this->received = $received;
    }

    /**
     * @return mixed
     */
    public function getPacketLoss()
    {
        return $this->packet_loss;
    }

    /**
     * @param mixed $packet_loss
     */
    public function setPacketLoss($packet_loss)
    {
        $this->packet_loss = $packet_loss;
    }
}