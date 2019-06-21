<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/6/20
 * Time: 21:59
 */

define("HOSTIMAGE",'//jk.helilan.cn/images/');

class Jk{


    public function index()
    {
        $banner = [
            ['banner_url' => HOSTIMAGE . 'index/index-white.png'],
            ['banner_url' => HOSTIMAGE . 'index/index-white.png'],
            ['banner_url' => HOSTIMAGE . 'index/index-white.png']
        ];

        //推荐
        $recommendList = [
            [
                'name' => '啤酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '啤酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '啤酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '啤酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
        ];

        $adList = [
            [
                'banner_url' => HOSTIMAGE . 'index/adlist.png'
            ],
            [
                'banner_url' => HOSTIMAGE . 'index/adlist.png'
            ],
            [
                'banner_url' => HOSTIMAGE . 'index/adlist.png'
            ],
            [
                'banner_url' => HOSTIMAGE . 'index/adlist.png'
            ]
        ];

        $newList = [
            [
                'name' => '葡萄美酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '葡萄美酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '葡萄美酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '葡萄美酒',
                'special_price' => '19.9',
                'small_img' => HOSTIMAGE . 'index/recom.png'
            ],
        ];

        $homeCategoryList = [
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cate_name' => '葡萄酒',
                'special_price' => '19.9',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
        ];

        $data['banner'] = $banner;
        $data['recommendList'] = $recommendList;
        $data['adList'] = $adList;
        $data['newList'] = $newList;
        $data['homeCategoryList'] = $homeCategoryList;


        echo json_encode($data);
    }

}

$Jk = new Jk();
$action = !empty($_GET['action']) ? $_GET['action'] : 'index';
$Jk->$action();