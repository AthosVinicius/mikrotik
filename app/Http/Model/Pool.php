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

class Pool extends Model{

    protected  $id;
    protected  $name;
    protected  $ranges;


    public function create($data, $METHOD = 'POST'){

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);

        if($this->exists_var($data,'.id'))
            $this->setId($data['.id']);
        if($this->exists_var($data,'name'))
            $this->setName($data['name']);
        if($this->exists_var($data,'ranges'))
            $this->setRanges($data['ranges']);
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
    public function getRanges()
    {
        return $this->ranges;
    }

    /**
     * @param mixed $ranges
     */
    public function setRanges($ranges)
    {
        $this->ranges = $ranges;
    }

}