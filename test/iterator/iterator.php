<?php

/**
 * Class customIterator
 *
 * 迭代器(Iterator)定义了5个方法。自定义对象通过对5个方法的实现来实现一种遍历对象的实现
 */

class customIterator implements \Iterator
{
    private $data = array();

    private $position = 0;

    public function __construct($arr)
    {
        if(is_array($arr)){
            $this->data = $arr;
        }
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
        echo "重置开始位置","<br />";
        $this->position = 0;
    }

    public function current()
    {
        // TODO: Implement current() method.
        echo "当前value：{$this->data[$this->position]}","<br />";
        return $this->data[$this->position];
    }

    public function key()
    {
        // TODO: Implement key() method.
        echo "当前key：{$this->position}","<br />";
        return $this->position;
    }

    public function next()
    {
        // TODO: Implement next() method.
        $this->position++;
        echo "下一个key：{$this->position}","<br />";
    }

    public function valid()
    {
        // TODO: Implement valid() method.
        $valid = isset($this->data[$this->position]);
        echo "判断当前值是否有效： {$valid}","<br />";
        return $valid;
    }

}

$arrrr = new \ArrayIterator(array('d','u','a','n'));

foreach ($arrrr as $value){
    echo $value,"<br />";
}