<?php


class customCount implements \Countable
{
    private $data = array();

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function count()
    {
        // TODO: Implement count() method.
        echo "返回数组个数","<br />";
        return count($this->data);
    }
}

$customCount = new customCount(array("贾宁","高波","杨丁","少阳"));
echo count($customCount);