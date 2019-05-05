<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/5/6
 * Time: 6:36
 */

namespace duanyude\core\request;


class request
{
    private $defaultController = 'index';
    private $defaultMethod = 'index';

    /**
     * @解析请求参数
     * @return array|string
     */
    public function resoleRequest()
    {
        $r = isset($_GET['r']) ? $_GET['r'] : (isset($_POST['r']) ? $_POST['r'] : '');
        $r = explode('/', $r);
        $r[0] = isset($r[0]) && !empty($r[0]) ? $r[0] : $this->defaultController;
        $r[1] = isset($r[1]) && !empty($r[1]) ? $r[1] : $this->defaultMethod;

        return $r;
    }
}