<?php
/**
 * Created by PhpStorm.
 * User: texte
 * Date: 23/03/2018
 * Time: 18:24
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class ActivePPP extends Model
{
    protected $name;

    public function create($data, $METHOD = 'POST')
    {

        //convert data to object
        $data = $this->verifyMethodCreate($METHOD, $data);
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


}