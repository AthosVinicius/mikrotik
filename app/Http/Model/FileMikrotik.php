<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 26/03/2018
 * Time: 14:50
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class FileMikrotik extends Model
{
    protected $id;
    protected $name;
    protected $type;
    protected $creation_time;

    public function create($data, $METHOD = 'POST')
    {
        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if ($this->exists_var($data, '.id'))
            $this->setId($data['.id']);
        if ($this->exists_var($data, 'name'))
            $this->setName($data['name']);
        if ($this->exists_var($data, 'type'))
            $this->setType($data['type']);
        if ($this->exists_var($data, 'creation_time'))
            $this->setCreationTime($data['creation_time']);
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
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCreationTime()
    {
        return $this->creation_time;
    }

    /**
     * @param mixed $creation_time
     */
    public function setCreationTime($creation_time)
    {
        $this->creation_time = $creation_time;
    }
}