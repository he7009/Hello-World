<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/14
 * Time: 21:24
 */

include __DIR__."/../vender/log.php";

class curl
{
    /**
     *
        curl_close — 关闭 cURL 会话
        curl_copy_handle — 复制一个cURL句柄和它的所有选项
        curl_errno — 返回最后一次的错误代码
        curl_error — 返回当前会话最后一次错误的字符串
        curl_escape — 使用 URL 编码给定的字符串
        curl_exec — 执行 cURL 会话
        curl_file_create — 创建一个 CURLFile 对象
        curl_getinfo — 获取一个cURL连接资源句柄的信息
        curl_init — 初始化 cURL 会话
        curl_multi_add_handle — 向curl批处理会话中添加单独的curl句柄
        curl_multi_close — 关闭一组cURL句柄
        curl_multi_errno — 返回上一次 curl 批处理的错误码
        curl_multi_exec — 运行当前 cURL 句柄的子连接
        curl_multi_getcontent — 如果设置了CURLOPT_RETURNTRANSFER，则返回获取的输出的文本流
        curl_multi_info_read — 获取当前解析的cURL的相关传输信息
        curl_multi_init — 返回一个新cURL批处理句柄
        curl_multi_remove_handle — 移除cURL批处理句柄资源中的某个句柄资源
        curl_multi_select — 等待所有cURL批处理中的活动连接
        curl_multi_setopt — 为 cURL 并行处理设置一个选项
        curl_multi_strerror — 返回字符串描述的错误代码
        curl_pause — 暂停和取消暂停一个连接。
        curl_reset — 重置一个 libcurl 会话句柄的所有的选项
        curl_setopt_array — 为 cURL 传输会话批量设置选项
        curl_setopt — 设置 cURL 传输选项
        curl_share_close — 关闭 cURL 共享句柄
        curl_share_errno — 返回共享 curl 句柄的最后一次错误号
        curl_share_init — 初始化一个 cURL 共享句柄。
        curl_share_setopt — 为 cURL 共享句柄设置选项。
        curl_share_strerror — 返回错误号对应的错误消息
        curl_strerror — 返回错误代码的字符串描述
        curl_unescape — 解码给定的 URL 编码的字符串
        curl_version — 获取 cURL 版本信息
     *
     *
     */
    public function start()
    {
        $ch = curl_init();

        //设置请求URL
        curl_setopt($ch, CURLOPT_URL, 'http://test.helilan.cn/curl/server.php');

        $options = [
            'COOKIE' => "name=duanyude; sessionid=asdfeasdfawefasdf; title=哼哈二将",
            'HTTPHEADER' => [
                'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0',
                "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8",
                "Accept-Language: zh-CN,zh;q=0.8,zh-TW;q=0.7,zh-HK;q=0.5,en-US;q=0.3,en;q=0.2",
            ],
            'REFERER' => '//www.dandureferer.com/',
        ];
        $data = [
            'name' => "段育德",
            'age' => array(2222,3333),
        ];


        //设置 REFERER
        if(!empty($options['REFERER'])){
            curl_setopt($ch,CURLOPT_REFERER,$options['REFERER']);
        }

        //设置 HTTP 头字段的数组。格式： array('Content-type: text/plain', 'Content-length: 100');
        if(!empty($options['HTTPHEADER'])) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $options['HTTPHEADER']);
        }

        // 设置超时时间 默认5秒
        $timeout = !empty($options['TIMEOUT']) ? intval($options['TIMEOUT']) : 5;
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        //设定 HTTP 请求中"Cookie: "部分的内容。多个 cookie 用分号分隔，分号后带一个空格(例如， "fruit=apple; colour=red")。
        if(!empty($options['COOKIE'])){
            curl_setopt($ch, CURLOPT_COOKIE, $options['COOKIE']);
        }

        if(!empty($data)){
            //设置请求方式,以及传递数据
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($data) ? http_build_query($data) : $data);
//            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }



        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $response = curl_exec($ch);

        var_dump($response);










    }

}


$curl = new curl();
$curl->start();