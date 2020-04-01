<?php
/**
 * Created by PhpStorm.
 * User: duanyude
 * Date: 2020/1/16 22:47
 */

namespace app\controllers;

use yii\web\Controller;

class BaseController extends Controller
{
    /**
     * @var int
     */
    public $userId = 0;
    /**
     * @var string
     */
    public $userName = "";

    public function __construct($id, $module, $config = [])
    {
        parent::__construct($id, $module, $config);

    }

    public function
}