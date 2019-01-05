<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2018/12/26
 * Time: 22:08
 */

class B{
    protected $aObj;
    /**
     * 测试构造函数依赖注入
     * @param A $a [使用引来注入A]
     */
    public function __construct(A $a) {
        $this->aObj = $a;
    }
    /**
     * [测试方法调用依赖注入]
     * @param C   $c [依赖注入C]
     * @param string $b [这个是自己手动填写的参数]
     * @return [type]  [description]
     */
    public function bb(C $c, $b) {
        $c->cc();
        echo "\r\n";
        echo 'params:' . $b;
    }
    /**
     * 验证依赖注入是否成功
     * @return [type] [description]
     */
    public function bbb() {
        $this->aObj->aac();
    }
}