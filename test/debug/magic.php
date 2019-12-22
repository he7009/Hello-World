<?php


class magic
{
    private $aaa = '';

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $method = "set" . $name;
        if(method_exists($this,$method)){
            $this->$method($value);
        }

    }

    public function setTraceLevel($value)
    {
        echo "执行了" . PHP_EOL;
        $this->aaa = $value;
    }
}

$magic = new magic();
$magic->tracelevel = 100;

var_dump($magic);
