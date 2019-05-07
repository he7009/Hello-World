<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/5/5
 * Time: 22:35
 */

namespace duanyude\template;

class template
{
    private $value = [];
    private $arrayConfig = [
        'suffix' => '.m',
    ];


    public function assign($key,$val)
    {
        if(is_array($key)){
            $this->value = array_merge($this->value,$key);
        }else{
            $this->value[$key] = $val;
        }
    }

    public function show()
    {

    }

}