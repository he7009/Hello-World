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

    public function cate()
    {
        $cateItems = [
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 1,
                'cate_name' => '红酒',
                'ishaveChild' => true,
                'children' => [
                    [
                        'child_id' => 1,
                        'name' => '红酒-1'
                    ],
                    [
                        'child_id' => 2,
                        'name' => '红酒-2'
                    ],
                    [
                        'child_id' => 3,
                        'name' => '红酒-3'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 1,
                'cate_name' => '白酒',
                'ishaveChild' => true,
                'children' => [
                    [
                        'child_id' => 1,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '白酒-1'
                    ],
                    [
                        'child_id' => 2,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '白酒-2'
                    ],
                    [
                        'child_id' => 3,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '白酒-3'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 1,
                'cate_name' => '啤酒',
                'ishaveChild' => true,
                'children' => [
                    [
                        'child_id' => 1,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '啤酒-1'
                    ],
                    [
                        'child_id' => 2,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '啤酒-2'
                    ],
                    [
                        'child_id' => 3,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '啤酒-3'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 1,
                'cate_name' => '饮料',
                'ishaveChild' => true,
                'children' => [
                    [
                        'child_id' => 1,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '饮料-1'
                    ],
                    [
                        'child_id' => 2,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '饮料-2'
                    ],
                    [
                        'child_id' => 3,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '饮料-3'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 1,
                'cate_name' => '其他',
                'ishaveChild' => true,
                'children' => [
                    [
                        'child_id' => 1,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '其他-1'
                    ],
                    [
                        'child_id' => 2,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '其他-2'
                    ],
                    [
                        'child_id' => 3,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '其他-3'
                    ],
                ]
            ],
        ];

//        $data['cateitems'] = $cateItems;
        echo json_encode($cateItems);
        exit;
    }

}

$Jk = new Jk();
$action = !empty($_GET['action']) ? $_GET['action'] :( !empty($_POST['action']) ? $_POST['action'] : 'index');
$Jk->$action();