<?php

// 联接FTP服务器
$conn = ftp_connect('ftp.jkmjk.com');

// 使用username和password登录
ftp_login($conn, 'ftpUser1', 'Appleid-88');

// 获取远端系统类型
ftp_systype($conn);

// 列示文件
$filelist = ftp_nlist($conn, '.');
var_dump($filelist);

// 下载文件
//ftp_get($conn, “data.zip”, “data.zip”, FTP_BINARY);

// 关闭联接
ftp_quit($conn);
