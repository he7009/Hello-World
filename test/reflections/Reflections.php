<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/1/6
 * Time: 10:50
 */

class Reflections
{
    public $aaaa = '';

    public function __construct($aaa = 1,array $bbb = array(),A $ccc)
    {
        $this->aaaa = $aaa;
    }
}

$reflection = new ReflectionClass('Reflections');

$contructor = $reflection->getConstructor();


$paramsters = $contructor->getParameters();

foreach ($paramsters as $param)
{
    if($param->isDefaultValueAvailable()){
        var_dump($param->getDefaultValue());
    }
}

