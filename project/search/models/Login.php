<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/1/16 22:50
 */

namespace app\models;


use yii\base\Model;

class Login extends BaseModel
{
    /**
     * @var string
     */
    public $token = "";

    public function getLoginInfo(){
        if(empty($this->token)){
            return [];
        }

        
    }
}