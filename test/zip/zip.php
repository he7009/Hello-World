<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/5/7
 * Time: 16:27
 */

class zip
{

    public function start()
    {
        echo 222;
        $zip = new ZipArchive();

        var_dump($zip->open('aaa.zip', ZipArchive::CREATE));

        if ($zip->open('aaa.zip', ZipArchive::CREATE) === TRUE) {
            /* ZipArchive类中的常用方法*/
            $zip->addEmptyDir('css');//在zip压缩包中建一个空文件夹，成功时返回 TRUE， 或者在失败时返回 FALSE
            $content = file_get_contents('https://dx3.ooopic.com/www/tsaCertificate/1001000000112968.pdf');
            file_put_contents('a.pdf',$content);
            $zip->addFile('a.pdf','111.pdf');//在zip更目录添加一个文件,并且命名为in.html,第二个参数可以省略
//            $zip->addFile(file_get_contents('https://dx3.ooopic.com/www/tsaCertificate/1001000000112969.pdf'));//在zip更目录添加一个文件,并且命名为in.html,第二个参数可以省略
//            $zip->addFromString('in.html','hello world');//往zip中一个文件中添加内容
//            $zip->extractTo('/tmp/zip/');//解压文件到/tmp/zip/文件夹下面
//            $zip->renameName('in.html','index.html');//重新命名zip里面的文件
//            $zip->setArchiveComment('Do what you love,Love what you do.');//设置压缩包的注释
//            $zip->getArchiveComment();//获取压缩包的注释
//            $zip->getFromName('index.html');//获取压缩包文件的内容
//            $zip->deleteName('index.html');//删除文件
//            $zip->setPassword('123456');//设置压缩包的密码
            $zip->close();//关闭资源句柄
        }else{
            echo "Open Fail";
        }

    }
}

(new zip())->start();