<?php


class customArrayIterator implements \IteratorAggregate
{
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new \ArrayIterator(array("d","u"));
    }
}

$custom = new customArrayIterator();

foreach ($custom as $value){
    echo $value,"<br />";
}
