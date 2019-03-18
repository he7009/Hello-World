<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/1/6
 * Time: 10:50
 */

class A
{

}

class Reflections
{
    public $aaaa = '';

    public function __construct($aaa,array $bbb = [],A $ccc)
    {
        $this->aaaa = $aaa;
    }
}

$reflection = new ReflectionClass('Reflections');

$contructor = $reflection->getConstructor();

$paramsters = $contructor->getParameters();
var_dump($paramsters);

foreach ($paramsters as $param)
{
    if($param->isDefaultValueAvailable()){
        echo 11111;
        var_dump($param->getDefaultValue());
    }else{
        echo 222222;
        $c = $param->getClass();
        var_dump($c);
    }
}

