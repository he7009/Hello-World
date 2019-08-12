<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/7/19
 * Time: 21:08
 */
define("HOSTIMAGE","//wxtg.jiakaisoft.com");

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
var_dump($data);
echo json_encode($data,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);