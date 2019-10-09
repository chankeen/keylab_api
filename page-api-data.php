<?php
//Template Name: data

//ini_set('display_errors',1);            //错误信息
//ini_set('display_startup_errors',1);    //php启动错误信息
//error_reporting(E_ALL);

session_start();
$user = wp_get_current_user();

$c = $_GET['page'];
$a = $_GET['action'];
$dir = get_template_directory_uri();
$file = $dir . '/keylabData/' . $c .'/'.$a .'.php?checking_api_file=true';

$file_headers = @get_headers($file);//检测是否存在此文件
if (strpos($file_headers[0], 'OK') > -1) {
    global $wpdb;
    include 'keylabData/' . $c .'/'.$a .'.php';
    exit();
} else {
    $rv = new stdClass();
    $rv->rc = -255;
    $rv->msg = $file_headers[0];
    echo json_encode($rv);
}

?>

