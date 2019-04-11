<?php
/**
 * Created by PhpStorm.
 * User: HP-PC
 * Date: 2019/4/10
 * Time: 22:31
 */


/**
 * Class index
 *
 *     session_abort — Discard session array changes and finish session
session_cache_expire — 返回当前缓存的到期时间
session_cache_limiter — 读取/设置缓存限制器
session_commit — session_write_close 的别名
session_create_id — Create new session id
session_decode — 解码会话数据
session_destroy — 销毁一个会话中的全部数据
session_encode — 将当前会话数据编码为一个字符串
session_gc — Perform session data garbage collection
session_get_cookie_params — 获取会话 cookie 参数
session_id — 获取/设置当前会话 ID
session_is_registered — 检查变量是否在会话中已经注册
session_module_name — 获取/设置会话模块名称
session_name — 读取/设置会话名称
session_regenerate_id — 使用新生成的会话 ID 更新现有会话 ID
session_register_shutdown — 关闭会话
session_register — Register one or more global variables with the current session
session_reset — Re-initialize session array with original values
session_save_path — 读取/设置当前会话的保存路径
session_set_cookie_params — 设置会话 cookie 参数
session_set_save_handler — 设置用户自定义会话存储函数
session_start — 启动新会话或者重用现有会话
session_status — 返回当前会话状态
session_unregister — Unregister a global variable from the current session
session_unset — 释放所有的会话变量
session_write_close — Write session data and end session
 */
class session
{
    public function index()
    {
        session_start();
        $_SESSION['aaaa'] = 123;

        echo session_name()."<br />";
        echo session_id()."<br />";
        session_regenerate_id();
        echo session_id()."<br />";

    }
}

$session = new session();
$session->index();