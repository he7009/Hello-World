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
            [
                'banner_url' => HOSTIMAGE . 'index/index-white.png',
                'cateid' => '111'
            ],
            [
                'banner_url' => HOSTIMAGE . 'index/index-white.png',
                'cateid' => '222'
            ],
            [
                'banner_url' => HOSTIMAGE . 'index/index-white.png',
                'cateid' => '333'
            ]
        ];

        $cateList = [
            [
                'cateid' => '111',
                'cate_name' => '白酒',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cateid' => '222',
                'cate_name' => '红酒',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'cateid' => '333',
                'cate_name' => '鸡尾酒',
                'icon_url' => HOSTIMAGE . 'index/recom.png'
            ]
        ];

        //推荐
        $recommendList = [
            [
                'name' => '五粮液',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '茅台',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '雪花',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '娃哈哈',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
        ];

        $active = [
            [
                'imgurl' => HOSTIMAGE . 'index/adlist.png',
                'search' => '红酒'
            ],
            [
                'imgurl' => HOSTIMAGE . 'index/adlist.png',
                'search' => '白酒'
            ],
            [
                'imgurl' => HOSTIMAGE . 'index/adlist.png',
                'search' => '鸡尾酒'
            ],
            [
                'imgurl' => HOSTIMAGE . 'index/adlist.png',
                'search' => '娃哈哈'
            ]
        ];

        $newList = [
            [
                'name' => '葡萄美酒',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '葡萄美酒',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '葡萄美酒',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
            [
                'name' => '葡萄美酒',
                'price' => '19.9',
                'imgurl' => HOSTIMAGE . 'index/recom.png'
            ],
        ];



        $data['bannerList'] = $banner;
        $data['cateList'] = $cateList;
        $data['recommendList'] = $recommendList;
        $data['active'] = $active;
        $data['newList'] = $newList;


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

    public function detail()
    {
        $productInfo = [
            'image_detail' => [
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png'
            ],
            'name' => '江小白',
            'special_price' => 19.8,
            'price' => 29.8,
            'sales_qty' => 1000,
            'description' => [
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png',
                HOSTIMAGE . 'index/recom.png'
            ],
            'qty' => 100
        ];

        echo json_encode($productInfo);
        exit;
    }

    public function car()
    {
        $carts = [
            [
                'stock_qty' => 10,
                'selected' => true,
                'id' => 1,
                'type' => 1,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'options' => [
                    [
                        'title' => '规格',
                        'value' => '箱'
                    ],
                    [
                        'title' => '品种',
                        'value' => '白酒'
                    ],
                    [
                        'title' => '度数',
                        'value' => '42'
                    ]
                ],
                'qty' => 1
            ],
            [
                'stock_qty' => 10,
                'selected' => false,
                'id' => 1,
                'type' => 1,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'options' => [
                    [
                        'title' => '规格',
                        'value' => '箱'
                    ],
                    [
                        'title' => '品种',
                        'value' => '白酒'
                    ],
                    [
                        'title' => '度数',
                        'value' => '42'
                    ]
                ],
                'qty' => 1
            ],
            [
                'stock_qty' => 10,
                'selected' => false,
                'id' => 1,
                'type' => 1,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'options' => [
                    [
                        'title' => '规格',
                        'value' => '箱'
                    ],
                    [
                        'title' => '品种',
                        'value' => '白酒'
                    ],
                    [
                        'title' => '度数',
                        'value' => '42'
                    ]
                ],
                'qty' => 1
            ],
            [
                'stock_qty' => 10,
                'selected' => true,
                'id' => 1,
                'type' => 1,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'options' => [
                    [
                        'title' => '规格',
                        'value' => '箱'
                    ],
                    [
                        'title' => '品种',
                        'value' => '白酒'
                    ],
                    [
                        'title' => '度数',
                        'value' => '42'
                    ]
                ],
                'qty' => 1
            ],
            [
                'stock_qty' => 10,
                'selected' => true,
                'id' => 1,
                'type' => 1,
                'small_img' => HOSTIMAGE . 'index/recom.png',
                'name' => '江小白',
                'special_price' => 19.8,
                'price' => 29.8,
                'options' => [
                    [
                        'title' => '规格',
                        'value' => '箱'
                    ],
                    [
                        'title' => '品种',
                        'value' => '白酒'
                    ],
                    [
                        'title' => '度数',
                        'value' => '42'
                    ]
                ],
                'qty' => 3
            ]
        ];

        echo json_encode($carts);
        exit;
    }

}

$Jk = new Jk();
$action = !empty($_GET['action']) ? $_GET['action'] :( !empty($_POST['action']) ? $_POST['action'] : 'index');
$Jk->$action();