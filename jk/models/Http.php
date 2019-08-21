<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/8/22
 * Time: 6:58
 */

namespace app\models;


use yii\base\Model;

class Http extends Model
{
    /**
     * @param $url
     * @param array $data
     * @param array $options
     * @return mixed
     */
    public static function get($url, $data = array(), $options = array())
    {
        if(empty($data)) {
            return self::curl($url, array(), $options);
        }
        // 拼接参数到url中
        $url = preg_match('/[?]/', $url) ? rtrim($url, '&') . '&' . http_build_query($data) : rtrim($url, '?') . '?' . http_build_query($data);
        return self::curl($url, array(), $options);
    }

    /**
     * @param $url
     * @param array $data
     * @param array $options
     * @return mixed
     */
    public static function post($url, $data = array(), $options = array())
    {
        return self::curl($url, $data, $options);
    }

    /**
     * @param $url
     * @param array $data
     * @param array $options
     * @return mixed|null
     */
    public static function curl($url, $data = array(), $options = array())
    {
        if(empty($url)) {
            return null;
        }

        // 自动添加HTTP
        if(!preg_match('/^http[s]?[:]\/\/(.*)/', $url)) {
            $url = 'http://' . $url;
        }

        // 处理$options
        if(!empty($options)) {
            foreach($options as $key => $option) {
                $key = preg_replace('/(CURLOPT_|curlopt_)/', '', $key);
                unset($options[$key]);
                $options[strtoupper($key)] = $option;
            }
        }

        // 初始化
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);

        // 设置HTTPHEADER
        if(!empty($options['HTTPHEADER'])) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $options['HTTPHEADER']);
        }

        // 设置超时时间 默认5秒
        $timeout = !empty($options['TIMEOUT']) ? intval($options['TIMEOUT']) : 50;
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

        // 设置只解析IPV4
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // 处理dns秒级信号丢失问题
        curl_setopt($ch, CURLOPT_NOSIGNAL, true);

        // 模拟浏览器标识
        //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/39.0.2171.95 Safari/537.36');

        // 设置COOKIE
        if(!empty($options['COOKIE'])) {
            curl_setopt($ch, CURLOPT_COOKIE, $options['COOKIE']);
        }

        // POST请求
        // 注意：这里默认GET请求的参数附带在URL里，如果直接使用http::curl()方法，并且传data参数，会触发POST请求
        if(!empty($data)) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, is_array($data) ? json_encode($data) : $data);
        }

        // 设置头部
        if(!empty($options['HEADER'])) {
            curl_setopt($ch, CURLOPT_HEADER, true);
        }

        // 设置其他参数
        $dcs = get_defined_constants(true);
        foreach($options as $option => $val) {
            if(!in_array($option, array('HEADER', 'COOKIE', 'TIMEOUT', 'HTTPHEADER'))) {
                $opt = 'CURLOPT_' . $option;
                $opt_defined = isset($dcs['curl'][$opt]) ? $dcs['curl'][$opt] : 0;
                if($opt_defined != 0) {
                    curl_setopt($ch, $opt_defined, $val);
                }
            }
        }

        if(curl_error($ch)){
            echo "curl" . PHP_EOL;
            var_dump(curl_error($ch));
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}