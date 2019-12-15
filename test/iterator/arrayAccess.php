<?php
/**
 * Class CustomArrayAccess
 *
 * ArrayAccess 通过实现四个方法，使类可以像操作数组一样被操作。仅限四个定义好的方法
 */

class CustomArrayAccess implements \ArrayAccess
{
    private $data = array("段育德","何丽兰","贾宁","杨丁","高波");

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
        echo "设置数组data","<br />";
        if(is_null($offset)){
            $this->data[] = $value;
        }else{
            $this->data[$offset] = $value;
        }
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
        echo "获取数组元素","<br />";
        return isset($this->data[$offset]) ? $this->data[$offset] : '';
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
        echo "删除数组元素","<br />";
        unset($this->data[$offset]);
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
        echo "检测数组元素是否存在","<br />";
        return isset($this->data[$offset]);
    }

}

$CustomArrayAccess = new CustomArrayAccess();

echo $CustomArrayAccess[0],"<br />","<br />";
$CustomArrayAccess[0] = "段家兴";
echo $CustomArrayAccess[0] , "<br />";
var_dump(isset($CustomArrayAccess[0]));
unset($CustomArrayAccess[0]);
var_dump(isset($CustomArrayAccess[0]));

var_dump($CustomArrayAccess);

$CustomArrayAccess["name"] = "Test";

var_dump($CustomArrayAccess);

$CustomArrayAccess[] = "dddd";

var_dump($CustomArrayAccess);