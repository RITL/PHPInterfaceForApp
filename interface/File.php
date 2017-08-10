<?php
/**
 * Created by PhpStorm.
 * User: yuewen
 * Date: 2017/8/10
 * Time: 上午9:54
 */

class File
{
    private  $_dir;
    const EXT = '.txt';

    public  function  __construct() {

         $this->_dir = dirname(__FILE__).'/files/';//dirname获取当前目录
    }

    public function cacheData($key, $value = '', $path = '') {

//        echo  $this->dir;
//        var_dump('dir = '.$this->_dir);

        $filename = $this->_dir.$path.$key.self::EXT;

//        var_dump('fliename = '.$filename);

        if($value !== '') { //将value写入缓存

            if (is_null($value)){//删除

                return @unlink($filename);
            }

            $dir = dirname($filename);

            if (!is_dir($dir)) {//如果不存在目录
                mkdir($dir);//创建文件
            }

            return file_put_contents($filename,json_encode($value));//进行存储
        }

        if (!is_file($filename)) {//如果不是合规的文件名

            return false;

        } else {

            //返回值
            return file_get_contents($filename);
        }
    }
}