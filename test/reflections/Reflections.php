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

    public function __construct($aaa,array $bbb = array(),A $ccc)
    {
        $this->aaaa = $aaa;
    }
}

$reflection = new ReflectionClass('Reflections');

$contructor = $reflection->getConstructor();


$paramsters = $contructor->getParameters();
$dependencies = [];
foreach ($paramsters as $param) {
    if (version_compare(PHP_VERSION, '5.6.0', '>=') && $param->isVariadic()) {
        echo "11111111".PHP_EOL;
        break;
    } elseif ($param->isDefaultValueAvailable()) {
        echo "22222222".PHP_EOL;
        $dependencies[] = $param->getDefaultValue();
    } else {
        echo "3333333".PHP_EOL;
        $c = $param->getClass();
        $dependencies[] = $c;
    }
}

var_dump($dependencies);

