<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/5/7
 * Time: 14:35
 */

namespace duanyude\template;


class compile
{
    private $content;
    private $value;
    private $T_P = [];
    private $T_R = [];
    public function construct($template,$compileDir)
    {
        $this->content = file_get_contents($template);

        $this->T_P[] = '';
    }

    public function compile($file)
    {

    }
}