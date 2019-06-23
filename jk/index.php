<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/6/20
 * Time: 21:59
 */

define("HOSTIMAGE",'//jk.helilan.cn/images/');

class Jk{

    /**
     * 首页
     */
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

    /**
     * 分类页
     */
    public function cate()
    {
        $cateItems = [
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 1,
                'cate_name' => '红酒',
                'ishaveChild' => 'true',
                'children' => [
                    [
                        'child_id' => 1,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '红酒-1'
                    ],
                    [
                        'child_id' => 2,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '红酒-2'
                    ],
                    [
                        'child_id' => 3,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '红酒-3'
                    ],
                    [
                        'child_id' => 4,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '红酒-4'
                    ],
                    [
                        'child_id' => 5,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '红酒-5'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 2,
                'cate_name' => '白酒',
                'ishaveChild' => 'true',
                'children' => [
                    [
                        'child_id' => 6,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '白酒-1'
                    ],
                    [
                        'child_id' => 7,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '白酒-2'
                    ],
                    [
                        'child_id' => 8,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '白酒-3'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 3,
                'cate_name' => '啤酒',
                'ishaveChild' => 'true',
                'children' => [
                    [
                        'child_id' => 9,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '啤酒-1'
                    ],
                    [
                        'child_id' => 10,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '啤酒-2'
                    ],
                    [
                        'child_id' => 11,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '啤酒-3'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 4,
                'cate_name' => '饮料',
                'ishaveChild' => 'true',
                'children' => [
                    [
                        'child_id' => 12,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '饮料-1'
                    ],
                    [
                        'child_id' => 13,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '饮料-2'
                    ],
                    [
                        'child_id' => 14,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '饮料-3'
                    ],
                ]
            ],
            [
                'banner' => HOSTIMAGE . 'index/recom.png',
                'cate_id' => 5,
                'cate_name' => '其他',
                'ishaveChild' => 'true',
                'children' => [
                    [
                        'child_id' => 15,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '其他-1'
                    ],
                    [
                        'child_id' => 16,
                        'image' => HOSTIMAGE . 'index/recom.png',
                        'name' => '其他-2'
                    ],
                    [
                        'child_id' => 17,
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

    public function lists()
    {
        $productList = [
            [
                'id' => 1,
                'type' => 2,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'sales_qty' => 11,
                'url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'id' => 1,
                'type' => 2,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'sales_qty' => 11,
                'url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'id' => 1,
                'type' => 2,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'sales_qty' => 11,
                'url' => HOSTIMAGE . 'index/recom.png'
            ]
        ];

        echo json_encode($productList);
        exit;
    }

}

$Jk = new Jk();
$action = !empty($_GET['action']) ? $_GET['action'] :( !empty($_POST['action']) ? $_POST['action'] : 'index');
$Jk->$action();