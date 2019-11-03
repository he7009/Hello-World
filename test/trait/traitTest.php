<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/11/3
 * Time: 20:31
 */

trait commonMethod
{
//    public $name = "commonMethod Name";
    public function showName()
    {
        echo "CommonMethod Show Name {$this->name}";
    }
}

class base
{
    public $name = "Base Name";

    public function showName()
    {
        echo "base Show Name {$this->name}" , "<br />";
    }
}

class traitTest extends base
{
    use commonMethod;

    public function showAge()
    {
        echo "traitTest Show Age <br />";
    }

    /**
     * @覆盖 commonMethod
     */
    public function showName()
    {
        echo "traitTest show Name {$this->name}";
    }
}

$traitTest = new traitTest();
$traitTest->showAge();
$traitTest->showName();