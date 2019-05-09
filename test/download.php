<?php
/**
 * Created by PhpStorm.
 * User: 段育德
 * Date: 2019/1/10
 * Time: 10:03
 */

class download
{
    public function downloadFile()
    {
        //根绝业务逻辑获取需要下载的文件地址,
        $sourceArr = [
            'file1' => 'https://www.ydphp.site/1',
            'file2' => 'https://www.ydphp.site/2',
            'file3' => 'https://www.ydphp.site/3'
        ];

        $tempDirName = $this->createTempDirName();
        $this->createDirPath(__DIR__ . "/" . $tempDirName);

        $sourcestr = ' ';  //为后面打包准备
        $option = array(
            'http' => array('header' => "Referer:https://www.ydphp.site/")
        );
        foreach ($sourceArr as $fileName => $fileUrl) {
            $content = @file_get_contents($fileUrl, false, stream_context_create($option));
            //注意文件的后缀，这边没做处理
            @file_put_contents(__DIR__ . "/" . $tempDirName . '/' . $fileName, $content);

            $sourcestr .= __DIR__ . "/" . $tempDirName . '/' . $fileName;
        }

        //压缩
        shell_exec("zip -q -j " . __DIR__ . "/" . md5($sourcestr) . '.zip' . $sourcestr);

        //告诉浏览器这是一个文件流格式的文件
        Header("Content-type: application/octet-stream");
        //请求范围的度量单位
        Header("Accept-Ranges: bytes");
        //Content-Length是指定包含于请求或响应中数据的字节长度
        Header("Accept-Length: " . filesize(__DIR__ . "/" . md5($sourcestr) . '.zip'));
        //用来告诉浏览器，文件是可以当做附件被下载，下载后的文件名称为$file_name该变量的值。
        Header("Content-Disposition: attachment; filename=" . md5($sourcestr) . '.zip');

        //这里没有做大文件的处理，可以看之前的博客 输出缓冲区 相关的内容
        readfile(__DIR__ . "/" . md5($sourcestr) . '.zip');

        //删除文件
        $this->deleteDirAndFile(__DIR__ . "/" . $tempDirName);


    }

    /**
     * @创建唯一临时文件夹名称
     *
     * @return string
     */
    private function createTempDirName()
    {
        return md5(uniqid() . rand(100000, 999999));
    }

    /**
     * @创建文件夹
     *
     * @param $dirPath
     * @return bool
     */
    private function createDirPath($dirPath)
    {
        return is_dir($dirPath) || @mkdir($dirPath, 0755, true);
    }

    /**
     * @删除多余文件，文件夹
     *
     * @param $dirPath
     * @return bool
     */
    private function deleteDirAndFile($dirPath)
    {
        if (is_dir($dirPath)) {
            $fileArr = scandir($dirPath);
            foreach ($fileArr as $val) {
                if ($val != '.' && $val != '..') {
                    unlink($dirPath . '/' . $val);
                }
            }
            rmdir($dirPath);
        } else if (is_file($dirPath)) {
            unlink($dirPath);
        }

        return true;
    }
}