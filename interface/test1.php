<?php
/**
 * Created by PhpStorm.
 * User: yuewen
 * Date: 2017/8/9
 * Time: 上午11:38
 */

require_once ('./Response.php');
require_once ('./File.php');


$arr = array(
    'id' => 1234,
    'name' => 'name1'
);

//utf8转码

//echo json_encode($arr);
//echo 12312;
//
//Response::json(200,"请求成功啦!",$arr)
//Response::xmlEncoding(200,'请求数据成功', $arr)
//标准格式
// code
// message
// data

$file = new File();

if ($file -> cacheData('TextCacheFile',$arr)){

    echo 'success';

} else {

    echo 'fail';
}

?>